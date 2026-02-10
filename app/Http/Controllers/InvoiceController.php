<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use ZipArchive;

class InvoiceController extends Controller
{
    public function download(Order $order)
    {
        // User must own the order or be admin
        if (auth()->user()->role !== 'admin' && auth()->id() !== $order->user_id) {
            abort(403);
        }

        if (!$order->invoice_number) {
            return back()->with('error', 'Invoice not available for this order.');
        }

        $order->load('items.product', 'coupon');

        $pdf = Pdf::loadView('invoices.pdf', compact('order'));

        return $pdf->download($order->invoice_number . '.pdf');
    }

    public function bulkDownload(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array|min:1',
            'order_ids.*' => 'exists:orders,id',
        ]);

        $orders = Order::with('items.product', 'coupon')
            ->whereIn('id', $request->order_ids)
            ->whereNotNull('invoice_number')
            ->get();

        if ($orders->isEmpty()) {
            return back()->with('error', 'No invoices available for selected orders.');
        }

        // Single order — just download the PDF directly
        if ($orders->count() === 1) {
            $order = $orders->first();
            $pdf = Pdf::loadView('invoices.pdf', ['order' => $order]);
            return $pdf->download($order->invoice_number . '.pdf');
        }

        // Multiple orders — create a ZIP
        $zipPath = storage_path('app/invoices-' . now()->timestamp . '.zip');
        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE) !== true) {
            return back()->with('error', 'Could not create ZIP file.');
        }

        foreach ($orders as $order) {
            $pdf = Pdf::loadView('invoices.pdf', ['order' => $order]);
            $zip->addFromString($order->invoice_number . '.pdf', $pdf->output());
        }

        $zip->close();

        return response()->download($zipPath, 'invoices.zip')->deleteFileAfterSend(true);
    }
}

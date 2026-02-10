<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbandonedCheckout;

class AbandonedCheckoutController extends Controller
{
    public function index()
    {
        $totalAbandoned = AbandonedCheckout::count();
        $totalRecovered = AbandonedCheckout::where('recovered', true)->count();
        $recoveryRate = $totalAbandoned > 0 ? round(($totalRecovered / $totalAbandoned) * 100, 1) : 0;

        $checkouts = AbandonedCheckout::latest()
            ->orderBy('recovered', 'asc')
            ->paginate(20);

        return view('admin.abandoned-checkouts.index', compact(
            'checkouts',
            'totalAbandoned',
            'totalRecovered',
            'recoveryRate'
        ));
    }

    public function show(AbandonedCheckout $abandoned_checkout)
    {
        $abandoned_checkout->load('user', 'recoveredOrder');

        return view('admin.abandoned-checkouts.show', [
            'checkout' => $abandoned_checkout,
        ]);
    }

    public function destroy(AbandonedCheckout $abandoned_checkout)
    {
        $abandoned_checkout->delete();

        return redirect()->route('admin.abandoned-checkouts.index')
            ->with('success', 'Abandoned checkout record deleted.');
    }
}

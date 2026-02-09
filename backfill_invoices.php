<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$orders = App\Models\Order::whereNotNull('payment_id')
    ->whereNull('invoice_number')
    ->orderBy('id')
    ->get();

foreach ($orders as $order) {
    $order->update(['invoice_number' => App\Models\Order::generateInvoiceNumber()]);
    echo "Order #{$order->id} => {$order->invoice_number}\n";
}

echo "Done. {$orders->count()} orders updated.\n";

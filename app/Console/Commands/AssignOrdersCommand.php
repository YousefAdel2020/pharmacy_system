<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Console\Command;

class AssignOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign new orders to highest priority pharmacy that serves same delivering address';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Retrieve all new orders
        $newOrders = Order::where('status', 'New')->get();

        foreach ($newOrders as $order) {
            // Retrieve all pharmacies that serve the same delivering address as the order
            $pharmacies = Pharmacy::where('area_id', $order->user->area_id)
                ->orderBy('priority', 'desc')
                ->get();

            if ($pharmacies->count() > 0) {
                // Assign the order to the highest priority pharmacy
                $pharmacy = $pharmacies->first();
                $order->pharmacy_id = $pharmacy->id;
                $order->status = 'Assigned';
                $order->save();
            }
        }

        $this->info('Orders assigned successfully');
    }
}

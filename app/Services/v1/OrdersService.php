<?php

namespace App\Services\v1;

use App\Order;
use App\Batch;
use App\User;

class OrdersService {

    public function getOrders() {
        return $this->filterOrders(Order::all());
    }

    protected function filterOrders($orders) {
        $data = [];

        foreach ($orders as $order) {
            $entry = [
                'id' => $order->id,
                'quantity' => $order->quantity,
                'batch' => $order->batch->where('id', $order->batch_id)->first(),
                'user' => $order->user->where('id', $order->user_id)->first(),
                'newbatch' => Batch::where('id', '=', $order->newbatch)->first(),
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $order->updated_at->format('Y-m-d H:i:s'),
                'href' => route('orders.show', ['id' => $order->id])
            ];

            $data[] = $entry;
        }

        return $data;
    }

    public function getOrder($orderId) {
        return $this->filterOrders(Order::where('id', $orderId)->get());
    }

    public function createOrder($req) {
        $order = new Order();

        $order->quantity = $req->input('quantity');
        $order->batch_id = $req->input('batch_id');
        $order->user_id = $req->input('user_id');

        $batch = new Batch();

        $batch->dosage = $order->batch->dosage;
        $tempDLU = date('d/m/y', strtotime('+2 years'));
        $batch->DLU = $tempDLU;
        $batch->drug_id = $order->batch->drug_id;
        $batch->box_id = $order->batch->box_id;
        $batch->quantity = $order->quantity;
        $batch->dotationU7 = $order->batch->dotationU7;

        $batch->save();

        $order->newbatch = $batch->id;

        $order->save();

        return $this->filterOrders([$order]);
    }
}
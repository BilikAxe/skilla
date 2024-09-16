<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Worker;
use App\Models\WorkerExOrderType;
use Illuminate\Http\JsonResponse;

class OrderService
{
    public function createOrder(array $data): JsonResponse
    {
        $order = Order::query()->create($data);

        return response()->json(['message' => 'Заказ создан', 'order' => $order]);
    }

    public function assignWorker(array $data): JsonResponse
    {
        $worker = Worker::query()->find($data['worker_id']);
        $order = Order::query()->find($data['order_id']);
        $isWorkerExcluded = WorkerExOrderType::query()
            ->where('worker_id', $worker->id)
            ->where('order_type_id', $order->type_id)
            ->exists();

        if ($isWorkerExcluded) {
            return response()->json(['message' => 'Исполнитель отказался от типа ' . $order->type->name]);
        }

        $order->workers()->attach($worker->id, ['amount' => $order->amount]);

        return response()->json(['message' => 'Назначен исполнитель', 'worker' => $worker]);
    }
}

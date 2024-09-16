<?php

namespace App\Services;

use App\Models\Worker;
use Illuminate\Http\JsonResponse;

class WorkerService
{
    public function getWorkersByOrderType(array $orderTypeIds): JsonResponse
    {
        $workers = Worker::query()->whereDoesntHave('excludedOrderTypes', function ($query) use ($orderTypeIds) {
            $query->whereIn('order_type_id', $orderTypeIds);
        })->get();

        return response()->json($workers);
    }
}

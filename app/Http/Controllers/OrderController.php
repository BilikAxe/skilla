<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignWorkerRequest;
use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService
    ) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderCreateRequest $request): JsonResponse
    {
        return $this->orderService->createOrder($request->toArray());
    }

    public function assignWorker(AssignWorkerRequest $request, Order $order): JsonResponse
    {
        return $this->orderService->assignWorker($request->toArray(), $order);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkersGetRequest;
use App\Models\Worker;
use App\Services\WorkerService;
use Illuminate\Http\JsonResponse;

class WorkerController extends Controller
{
    public function __construct(private readonly WorkerService $workerService) {}

    public function getWorkersByOrderTypes(WorkersGetRequest $request): JsonResponse
    {
        $orderTypeIds = $request->get('order_type_ids');
        return $this->workerService->getWorkersByOrderType($orderTypeIds);
    }
}

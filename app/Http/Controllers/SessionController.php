<?php

namespace App\Http\Controllers;

use App\Services\SessionService;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct(
        private readonly SessionService $sessionService
    ) {}

    public function getActiveSessions(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();

        $activeSessions = $this->sessionService->getActiveSession($user);

        return response()->json($activeSessions);
    }

    public function revokeSession(Request $request, string $tokenId): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();

        return $this->sessionService->revokeSession($user, $tokenId);
    }
}

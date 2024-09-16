<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {}

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->authService->login($request->get('email'), $request->get('password'));
    }

    public function registration(RegistrationRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->authService->registration($request->get('name'), $request->get('email'), $request->get('password'));
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
}

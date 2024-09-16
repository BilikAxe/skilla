<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(string $email, string $password): \Illuminate\Http\JsonResponse
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = $user->createToken('Token')->accessToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function registration(string $name, string $email, string $password): \Illuminate\Http\JsonResponse
    {
        User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return response()->json(['message' => 'Registration successful']);
    }
}

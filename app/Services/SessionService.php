<?php

namespace App\Services;

use App\Models\User;
use Laravel\Passport\Token;

class SessionService
{
    public function getActiveSession(User $user): \Illuminate\Database\Eloquent\Collection
    {
        return Token::query()
            ->where('user_id', $user->id)
            ->where('revoked', false)
            ->where('expired_at', '>', now())
            ->get(['id', 'name', 'created_at', 'expired_at']);
    }

    public function revokeSession(User $user, string $tokenId): \Illuminate\Http\JsonResponse
    {
        $token = Token::query()
            ->where('id', $tokenId)
            ->where('user_id', $user->id)
            ->first();

        if (!$token) {
            return response()->json(['message' => 'Token not found or not authorized to revoke this token.'], 404);
        }

        $token->revoke();

        return response()->json(['message' => 'Session has been successfully revoked.']);
    }
}

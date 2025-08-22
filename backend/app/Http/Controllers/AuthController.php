<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $abilities = [];
            if ($request->user()->is_admin) {
                $abilities = ['product:modify'];
            }
            $token = $request->user()->createToken('token', $abilities);
            return response()->json(["token" => $token->plainTextToken]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register(RegisterRequest $request): JsonResponse {
        $credentials = $request->validated();
        $user = User::create($credentials);

        return response()->json($user->toArray());
    }
}

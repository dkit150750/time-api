<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function hasLogin(Request $request): JsonResponse
    {
        $user = User::where('login', $request->login)->first();
        if ($user) {
            return response()->json(['success' => true, 'hasLogin' => true]);
        }
        return response()->json(['success' => false, 'hasLogin' => false]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('login', $request->login)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'data' => 'Предоставленные учетные данные неверны',
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;
        $user->token = $token;
        $userResource = new UserResource($user);
        return response()->json(['user' => $userResource]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function password(Request $request): JsonResponse
    {
        $user = User::where('login', $request->login)->first();
        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return response()->json(['current_password' => 'Неверный текущий пароль'], 400);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['message' => 'success']);
    }
}

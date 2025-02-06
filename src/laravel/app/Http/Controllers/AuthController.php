<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // 入力されたemailとpasswordを取得
        $credentials = $request->only('email', 'password');

        // 認証が成功した場合
        if (Auth::attempt($credentials)) {
            // 認証成功
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);
            return response()->json(['token' => $token]);
        } else {
            // 認証失敗
            logger()->warning('Failed login attempt for email: ' . $request->email);
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        try {
            // トークンが無効な場合、エラーを投げる
            $token = JWTAuth::getToken();

            if (!$token) {
                throw new Exception('Invalid token');
            }

            // トークンを無効化
            JWTAuth::invalidate($token);

            // ログアウト成功のレスポンス
            return response()->json(['message' => 'Logged out successfully']);
        } catch (Exception $e) {
            logger()->error('Logout failed: ' . $e->getMessage());
            return response()->json(['error' => 'Logout failed', 'message' => $e->getMessage()], 500);
        }
    }
}

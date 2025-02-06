<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // フロントエンドのURL（例: http://127.0.0.1:3001/login）にリダイレクト
        if ($request->expectsJson()) {
            return null; // JSON APIリクエストの場合、リダイレクトしない
        }

        // フロントエンドの /login にリダイレクト
        return 'http://127.0.0.1:3001/login';
    }
}

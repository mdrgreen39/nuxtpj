<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleCors
{
    public function handle($request, Closure $next)
    {
        // CORS ヘッダーの設定
        $headers = [
            'Access-Control-Allow-Origin'      =>
            'http://127.0.0.1:3001', // フロントのオリジンを取得
            'Access-Control-Allow-Methods'     => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With',
            'Access-Control-Allow-Credentials' => 'true', // ここを明示的に true に
        ];

        // OPTIONSリクエスト（プリフライト）の対応
        if ($request->isMethod('OPTIONS')) {
            return response()->json([], 200, $headers);
        }

        // レスポンスにCORSヘッダーを追加
        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}

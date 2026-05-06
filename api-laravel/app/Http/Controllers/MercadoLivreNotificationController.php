<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MercadoLivreNotificationController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        Log::info('Mercado Livre notification received', [
            'topic' => $request->input('topic'),
            'resource' => $request->input('resource'),
            'user_id' => $request->input('user_id'),
            'application_id' => $request->input('application_id'),
            'attempts' => $request->input('attempts'),
            'sent' => $request->input('sent'),
            'payload' => $request->all(),
        ]);

        return response()->json([
            'received' => true,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Need;
use Log;

class MessageController extends Controller
{
    /**
     * Stores the resource in the database.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {
        $from = ltrim(request('msisdn'), '1');
        $time = request('message-timestamp');
        $text = request('text');

        Log::info('FROM: ' . $from . ' - TEXT: ' . $text);

        $need = Need::wherePhone($from)->first();

        $need->update([
            'received_text' => true,
            'text_message' => $text,
            'text_received_at' => $time,
            'is_complete' => false
        ]);

        return response(['success' => true], 200);
    }
}

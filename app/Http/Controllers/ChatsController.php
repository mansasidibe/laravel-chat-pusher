<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    // PROTEGEONS TOUTES NOS FONCTION
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index()
    {
    return view('chat');
    }


    public function fetchMessages()
    {
    return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => $request->input('message')
    ]);

    return ['status' => 'Message envoyé!'];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function index(){
        return view('chat');
    }

    public function fetchMessages(int $id){
        return Message::where(function($query) use ($id){
            $query->where('user_id', Auth::id())
                ->where('recipient_id', $id);
        })
        ->orWhere(function($query) use ($id){
            $query->where('user_id', $id)
                ->where('recipient_id', Auth::id());
        })
        ->get();
    }

    public function sendMessage(Request $request, int $id){
        $userId = Auth::id();
        
        $message = User::find($userId)->messages()->create([
            'message' => $request->input('message')
        ]);

        return ['status' => 'Message sent'];
    }
}

<?php

namespace App\Http\Controllers;
use App\Events\PusherBroadcast;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin/room/index');
    }

    public function enterName()
    {
        return view('name');
    }

    public function setName(Request $request)
    {
        $request->session()->put('user_name', $request->input('name'));
        return redirect('/chat_room');
    }

    public function ChatRoom()
    {
        return view('chat');
    }

    public function broadcast(Request $request)
    {
        $message = $request->get('message');
        $isOwnMessage = $request->get('isOwnMessage');
        $name = $request->get('name');

        broadcast(new PusherBroadcast($message, $isOwnMessage, $name))->toOthers();

        return view('broadcast', [
            'message' => $message,
            'isOwnMessage' => $isOwnMessage,
            'name' => $name
        ]);
    }

    public function receive(Request $request)
    {
        return view('receive', [
            'message' => $request->get('message'),
            'isOwnMessage' => $request->get('isOwnMessage'),
            'name' => $request->get('name')
        ]);
    }
}

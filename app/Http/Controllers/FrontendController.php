<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getmsg(Request $request)
    {
        $model = Message::where('room_id', $request->id)->where('status', 1)->get();

        return $model;
    }

    public function sendmsg(Request $request)
    {
        $model = new Message();
        $model->room_id = $request->room_id;
        $model->name = $request->name;
        $model->text = $request->msg;
        $model->save();

        return response()->json([
            'name' => $request->name,
            'msg' => $request->msg
        ]);
    }

    public function sendFile(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        $message = new Message;
        $message->room_id = $request->room_id;
        $message->name = $request->name;
        $message->text = null;
        $message->image = 'uploads/' . $filename;
        $message->save();

        return response()->json(['success' => true]);
    }

}

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $data = DB::table('cms')
        ->get();

        return view('admin.dashboard', ['data' => $data]);
    }
}

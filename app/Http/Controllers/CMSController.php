<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cms;

class CMSController extends Controller
{
    public function index(){

        $data = DB::table('cms')
        ->get();

        return view('admin.cms', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'website_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'primary_color' => 'required|string|size:7',
            'secondary_color' => 'required|string|size:7',
        ]);

        $cms = Cms::findOrFail($id);

        $cms->website_name = $request->input('website_name');
        $cms->primary_color = $request->input('primary_color');
        $cms->secondary_color = $request->input('secondary_color');

        if ($request->hasFile('logo')) {
            if ($cms->logo && file_exists(public_path('/assets/image_content/'.$cms->logo))) {
                unlink(public_path('/assets/image_content/'.$cms->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('/assets/image_content'), $logoName);
            $cms->logo = $logoName;
        }

        $cms->save();

        return response()->json(['message' => 'Data updated successfully!']);
    }
}

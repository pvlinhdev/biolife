<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('admin.profile.index', compact('user'));
    }
    public function index(){
        return view('admin.profile.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        // $product = resolve(ShowProductAction::class)->find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // xử lý ảnh
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'user.'.$ext;
            $file->move(public_path('uploads/users'),$file_name);
            $request->merge(['image' => $file_name ]);
        }
        $user = User::update($id, $request->all());    

        return response()->json(['status' => 'success']);
    }
}

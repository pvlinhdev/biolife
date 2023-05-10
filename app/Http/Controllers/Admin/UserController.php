<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\Action\CreateUserAction;
use App\Services\User\Action\ShowUserAction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $userList = resolve(ShowUserAction::class)->getUserList();
        // // $userList = User::all();
        // return view('admin.user.index', array(
        //     'userList' => $userList,
        // ));

        $userList = User::paginate(10);
        return view('admin.user.index',compact('userList'))->with('i', (request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // xử lý ảnh
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'user.'.$ext;
            $file->move(public_path('uploads/users'),$file_name);
            $request->merge(['image' => $file_name ]);
        }
        $user = resolve(CreateUserAction::class)->create($request->all());
        if ($user) {
            alert()->success('User Created', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('User Created', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('admin.user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = resolve(ShowUserAction::class)->find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // xử lý ảnh
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'user.'.$ext;
            $file->move(public_path('uploads/users'),$file_name);
            $request->merge(['image' => $file_name ]);
        }
        $user = resolve(ShowUserAction::class)->update($id, $request->all());
        if ($user) {
            alert()->success('User Update', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('User Update', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'success']);
        // return view('admin.user.index');
    }

}

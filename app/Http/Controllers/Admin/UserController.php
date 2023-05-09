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
        $user = resolve(CreateUserAction::class)->create($request->all());
        // dd($user);
        return response()->json(['status' => 'success']);
        // return view('admin.user.index');
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
        $user = resolve(ShowUserAction::class)->update($id, $request->all());
        return response()->json(['status' => 'success']);
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

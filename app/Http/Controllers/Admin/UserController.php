<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Services\User\Action\ShowUserAction;
use Spatie\Permission\Models\Role;
use DB;
// use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {

        $userList = User::orderBy('id', 'DESC')->paginate(5);

        return view('admin.user.index', compact('userList'));
    }


    public function create()
    {
        if (auth()->user()->hasRole('Super-Admin')) {
            $roles = Role::pluck('name', 'name')->all();
        } else {
            $roles = Role::pluck('name', 'name')->except(['name', 'Super-Admin']);
        }

        return view('admin.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            'roles' => 'required'
        ]);
        // xử lý ảnh
        if ($request->hasFile('file_upload')) {
            try {
                $file = $request->file_upload;
                $ext = $file->getClientOriginalExtension();
                $file_name = time() . '-user.' . $ext;
                $path = public_path('/uploads/users/');
                $file->move($path, $file_name);
                $request->merge(['image' => $file_name]);
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Có lỗi khi tải lên ảnh đại diện']);
            }
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $notification = array(
            'message' => 'User created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.user.index')
            ->with($notification);
    }

    public function show($id)
    {
        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        // $user = User::find($id);
        // $roles = Role::pluck('name', 'name')->all();
        // $userRole = $user->roles->pluck('name', 'name')->all();

        // return view('admin.user.edit', compact('user', 'roles', 'userRole'));
        $user = User::find($id);
        if ($user->hasRole('Super-Admin')) {
            $notification = array(
                'message' => "You have no permission for edit this user",
                'alert-type' => 'error'
            );
            return redirect()->route('admin.user.index')
                ->with($notification);
        }
        if (auth()->user()->hasRole('Super-Admin')) {
            $roles = Role::pluck('name', 'name')->all();
        } else {
            $roles = Role::pluck('name', 'name')->except(['name', 'Super-Admin']);
        }
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.user.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        $notification = array(
            'message' => 'User updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.user.index')
            ->with($notification);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}

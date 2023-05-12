<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use PhpParser\Node\Stmt\TryCatch;


use DB;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class PermissionController extends Controller
{

    function __construct()
    {
        $this->middleware('role:Super-Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(7);

        return view('admin.permissions.index', compact('permissions'))->with('i', (request()->input('page',1) -1) *7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:permissions',
        ]);
        $permissions = Permission::Create(
            [
                'name' => $request->name,
            ]
        );

        $notification = array(
            'message' => 'Permission added successfully',
            'alert-type' => 'success'
        );
        if ($permissions) {
            alert()->success('Permission Created', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('Permission Created', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }

        return redirect()->route('admin.permissions.index')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return redirect()->route('admin.permissions.index');
    }

    public function edit($id){
        $permissions = Permission::find($id);

        
        return view('admin.permissions.edit', array(
            '$permissions' => $permissions
        ), compact('permissions'));
    }

    public function update(Request $request, $id){
        $permissions = Permission::find($id);
        $permissions->update(
            $request->all()
        );
        if ($permissions) {
            alert()->success('Permission Update', 'Successfully'); // hoặc có thể dùng alert('Post Update','Successfully', 'success');
        } else {
            alert()->error('Permission Update', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('admin.permissions.index');
    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id', $id)->delete();
        return response()->json([
            'message' => 'Record deleted successfully!'
        ]);
        
    }
}

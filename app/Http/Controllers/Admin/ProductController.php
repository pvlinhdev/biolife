<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Product\Actions\CreateProductAction;
use App\Services\Product\Actions\ShowProductAction;
use App\Services\Product\Actions\UpdateProductAction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $productList = resolve(ShowProductAction::class)->run();
        $productList = Product::paginate(10);
        return view('admin.product.index',compact('productList'))->with('i', (request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // xử lý ảnh
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads/products'),$file_name);
            $request->merge(['image' => $file_name ]);
        }
        $product = resolve(CreateProductAction::class)->create($request->all());

        if ($product) {
            alert()->success('Product Created', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('Product Created', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('admin.product.index');
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
    public function edit($id)
    {
        $product = Product::find($id);
        // $product = resolve(ShowProductAction::class)->find($id);
        return view('admin.product.edit', compact('product'));
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
        $product = resolve(UpdateUserAction::class)->update($id, $request->all());
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

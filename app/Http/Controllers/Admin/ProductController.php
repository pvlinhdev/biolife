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
        $productList = resolve(ShowProductAction::class)->run();
        return view('admin.product.index',compact('productList'));
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
    public function store(Request $request)
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
        // return response()->json(['status' => 'success']);
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
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads/products'),$file_name);
            $request->merge(['image' => $file_name ]);
        }
        $product = resolve(UpdateProductAction::class)->update($id, $request->all());
        // return redirect()->route('admin.category.index');
        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

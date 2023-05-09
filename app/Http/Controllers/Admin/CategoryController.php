<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Category\Actions\CreateCategoryAction;
use App\Services\Category\Actions\DeleteCategoryAction;
use App\Services\Category\Actions\ShowCategoryAction;
use App\Services\Category\Actions\UpdateCategoryAction;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryList = resolve(ShowCategoryAction::class)->run();
        return view('admin.category.index', array(
            'categoryList' => $categoryList,
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(CategoryRequest $request)
    // {
    //     $category = resolve(CreateCategoryAction::class)->create($request->all());
    //     return redirect()->route('admin.category.index');
    // }
    public function store(CategoryRequest $request)
    {
        $category = resolve(CreateCategoryAction::class)->create($request->all());
        return response()->json(['status' => 'success']);
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
        $category = resolve(ShowCategoryAction::class)->find($id);
        return view('admin.category.edit', array('category' => $category));
    }

    public function update(Request $request, $id)
    {
        $category = resolve(UpdateCategoryAction::class)->update($id, $request->all());
        // resolve(UpdateCategoryAction::class)->updateCategoryMedia($category, $request);
        // return redirect()->route('admin.category.index');
        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Danh mục đã được xoá thành công.');
    }
    // public function destroy($id)
    // {
    //     $category = Category::find($id);
    //     if ($category) {
    //         $category->delete();
    //         return response()->json(['success' => 'Đã xoá danh mục thành công!']);
    //     } else {
    //         return response()->json(['error' => 'Không tìm thấy danh mục!']);
    //     }
    // }
}

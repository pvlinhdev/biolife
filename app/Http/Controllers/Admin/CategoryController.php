<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
        $categoryList = resolve(ShowCategoryAction::class)->run();
        return view('admin.category.index', array('categoryList' => $categoryList));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = resolve(CreateCategoryAction::class)->create($request->all());
        // $category->addMediaFromRequest('image')->usingName($category->name)->toMediaCollection('categories_images');
        $request->session()->flash('status', 'Thêm thành công');
        return redirect()->route('admin.category.index');
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
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $bool = resolve(DeleteCategoryAction::class)->delete($id);
        if ($bool)
            $request->session()->flash('status', 'xóa thanh cong');
        else
            $request->session()->flash('status', 'xóa that bai');

        return redirect()->route('admin.category.index');
    }
}

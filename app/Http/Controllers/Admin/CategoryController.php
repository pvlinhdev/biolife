<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Category\Actions\CreateCategoryAction;
use App\Services\Category\Actions\DeleteCategoryAction;
use App\Services\Category\Actions\ShowCategoryAction;
use App\Services\Category\Actions\UpdateCategoryAction;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Alert;

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

        if ($category) {
            alert()->success('Category Created', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('Category Created', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('admin.category.index');
        // return response()->json(['status' => 'success']);
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
        if ($category) {
            alert()->success('Category Created', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('Category Created', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('admin.category.index');
        // resolve(UpdateCategoryAction::class)->updateCategoryMedia($category, $request);
        // return redirect()->route('admin.category.index');

        // return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
        try {
            $category->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete category'], 500);
        }

        return response()->json(['success' => true], 200);
    }
    // public function destroy($id)
    // {
    //     $category = Category::findOrFail($id);
    //     $category->delete();

    //     return redirect()->route('category.index');
    //     // Trả về thông báo xác nhận
    //     // return redirect()->route('admin.category.index');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Services\Category\Actions\ShowCategoryAction;
use App\Services\Product\Actions\ShowProductAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("index");
    }

    public function show_product(){
        $productList = resolve(ShowProductAction::class)->run();
        return view("product", array("productList" => $productList));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function product_detail($slug){
        $product = resolve(ShowProductAction::class)->getProductBySlug($slug);
        // $productList = resolve(ShowProductAction::class)->run();

        return view("product_detail", array(
            "product" => $product,
            // "productList" => $productList,
        ));
    }
    public function category_detail(Request $request, $slug)
    {
        try {
            $category = resolve(ShowCategoryAction::class)->getCategoryBySlug($slug);
            $productList = $category->products()->get();
        } catch (ModelNotFoundException $ex) {
            redirect()->route("category.notfound");
        }
        return view(
            "product",
            array(
                "category" => $category,
                "productList" => $productList,
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

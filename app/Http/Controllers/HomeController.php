<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\Category\Actions\ShowCategoryAction;
use App\Services\Product\Actions\ShowProductAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("index");
    }

    public function admin()
    {
        return view("admin.dashboard");
    }
    protected function getRelatedProducts($category_id, $slug)
    {
        return Product::where('category_id', $category_id)
            ->where('slug', '<>', $slug)
            ->inRandomOrder()
            ->limit(6)
            ->get();
    }
    public function show_product()
    {
        // $productList = resolve(ShowProductAction::class)->run();
        $productList = Product::paginate(24);
        return view('product',compact('productList'))->with('i', (request()->input('page',1) -1) *5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function product_detail($slug)
    {
        $product = resolve(ShowProductAction::class)->getProductBySlug($slug);
        $product->views += 1;
        $product->save();
        $relatedProducts = $this->getRelatedProducts($product->category_id, $product->slug);
        return view("product_detail", compact('product', 'relatedProducts'));
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
    // search
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        // Truy vấn các sản phẩm có tên gần đúng với từ khoá tìm kiếm
        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('search_product', compact('products'));
    }
    // search
    public function getsearch(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        // Truy vấn các sản phẩm có tên gần đúng với từ khoá tìm kiếm
        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('search_product', compact('products'));
    }
}

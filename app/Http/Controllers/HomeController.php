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
    public function index(Product $product)
    {
        // $related = $product->relatedProducts(4, true)->with('categories')->get();

        // return view('index', compact('product', 'related'));
        $bestSellers = Product::bestSellers(8);
        return view('index', compact('bestSellers'));
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
    // public function show_product()
    // {
    //     // $productList = resolve(ShowProductAction::class)->run();
    //     $productList = Product::paginate(24);

    //     return view('product',compact('productList'))->with('i', (request()->input('page',1) -1) *5);
    // }
    public function show_product()
    {
        $sortBy = request()->input('sort_by', 'name_asc');

        // ->appends(request()->query()); để chuyển page vẫn giữ sortBy
        switch ($sortBy) {
            case 'price_desc':
                $productList = Product::orderByDesc('price')->paginate(24)->appends(request()->query());
                break;
            case 'price_asc':
                $productList = Product::orderBy('sale_price')->paginate(24)->appends(request()->query());
                break;
            case 'name_desc':
                $productList = Product::orderByDesc('name')->paginate(24)->appends(request()->query());
                break;
            default:
                $productList = Product::orderBy('name')->paginate(24)->appends(request()->query());
                break;
        }
        return view('product', [
            'productList' => $productList,
            'i' => (request()->input('page', 1) - 1) * 5,
            'sort_by' => $sortBy,
        ]);
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
            "category",
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $cat = Category::all();
        return $cat;
    }
    public function edit($id){
        $cat = Category::find($id);
        return $cat;
    }
    public function delete($id){
        $cat = Category::destroy($id);
        return $cat;
    }
    public function create(Request $request){
        $cat = Category::create($request->all());
        return $cat;
    }

}

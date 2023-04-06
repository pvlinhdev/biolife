<?php

namespace App\Http\Repositories\Product;

use App\Http\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface{
    public function getModel(){
        return Product::class;
    }

    public function list(){
        return $this->getAll();
    }

    public function getProductBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
    
}
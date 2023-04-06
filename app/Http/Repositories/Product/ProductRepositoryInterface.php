<?php

namespace App\Http\Repositories\Product;

interface ProductRepositoryInterface{
    public function list();
    public function getProductBySlug($slug);
}
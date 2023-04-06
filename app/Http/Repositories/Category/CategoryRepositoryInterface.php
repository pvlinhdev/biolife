<?php

namespace App\Http\Repositories\Category;

interface CategoryRepositoryInterface{
    public function list();
    public function getCategoryBySlug($slug);

}

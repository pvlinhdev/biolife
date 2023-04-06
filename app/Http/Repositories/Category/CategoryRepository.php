<?php

namespace App\Http\Repositories\Category;

use App\Http\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function list()
    {
        return $this->getAll();
    }

    public function getCategoryBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}

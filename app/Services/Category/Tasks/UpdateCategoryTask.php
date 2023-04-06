<?php

namespace App\Services\Category\Tasks;

use App\Http\Repositories\Category\CategoryRepository;
use App\Services\Task;

class UpdateCategoryTask extends Task
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($id, array $attributes)
    {
        return $this->repository->update($id, $attributes);
    }

    public function updateCategoryMedia($category, $request)
    {
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('categories_images');
            $category->addMediaFromRequest('image')->usingName($category->name)->toMediaCollection('categories_images');
        }
    }
}

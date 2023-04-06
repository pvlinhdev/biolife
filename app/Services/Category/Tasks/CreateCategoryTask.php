<?php

namespace App\Services\Category\Tasks;

use App\Http\Repositories\Category\CategoryRepository;
use App\Services\Task;

class CreateCategoryTask extends Task
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }
}

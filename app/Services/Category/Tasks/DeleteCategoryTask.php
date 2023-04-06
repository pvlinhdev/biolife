<?php

namespace App\Services\Category\Tasks;

use App\Http\Repositories\Category\CategoryRepository;
use App\Services\Task;

class DeleteCategoryTask extends Task
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id){
        return $this->repository->delete($id);
    }
}
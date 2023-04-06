<?php
namespace App\Services\Category\Tasks;

use App\Http\Repositories\Category\CategoryRepository;
use App\Services\Task;

class ShowCategoryTask extends Task
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->list();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
    public function getCategoryBySlug($slug)
    {
        return $this->repository->getCategoryBySlug($slug);
    }
}

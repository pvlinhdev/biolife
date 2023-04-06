<?php
namespace App\Services\Product\Tasks;

use App\Http\Repositories\Product\ProductRepository;
use App\Services\Task;

class CreateProductTask extends Task{

    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes){
        return $this->repository->create($attributes);
    }

}
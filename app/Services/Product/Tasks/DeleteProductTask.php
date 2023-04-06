<?php
namespace App\Services\Product\Tasks;

use App\Http\Repositories\Product\ProductRepository;
use App\Services\Task;

class DeleteProductTask extends Task{

    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

}
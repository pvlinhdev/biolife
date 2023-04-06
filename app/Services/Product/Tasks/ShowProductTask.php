<?php
namespace App\Services\Product\Tasks;

use App\Http\Repositories\Product\ProductRepository;
use App\Services\Task;

class ShowProductTask extends Task{

    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(){
        return $this->repository->list();
    }

    public function getSingleProduct($id){
        return $this->repository->find($id);
    }
    
    public function getProductBySlug($slug){
        return  $this->repository->getProductBySlug($slug);
    }

    public function getProductByName($name){
        return  $this->repository->findByField("name", "like", $name);
    }
}
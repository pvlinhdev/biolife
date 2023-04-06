<?php
namespace App\Services\OrderDetail\Tasks;

use App\Http\Repositories\OrderDetail\OrderDetailRepository;
use App\Services\Task;

class ShowOrderDetailTask extends Task
{
    private $repository;

    public function __construct(OrderDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->list();
    }

    public function find($id){
        return $this->repository->find($id);

    }

}

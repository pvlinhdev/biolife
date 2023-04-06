<?php

namespace App\Services\Order\Tasks;

use App\Http\Repositories\Order\OrderRepository;
use App\Services\Task;

class DeleteOrderTask extends Task
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id){
        return $this->repository->delete($id);
    }
}
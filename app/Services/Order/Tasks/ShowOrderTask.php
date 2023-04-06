<?php
namespace App\Services\Order\Tasks;

use App\Http\Repositories\Order\OrderRepository;
use App\Services\Task;

class ShowOrderTask extends Task
{
    private $repository;

    public function __construct(OrderRepository $repository)
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

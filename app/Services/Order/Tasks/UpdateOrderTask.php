<?php

namespace App\Services\Order\Tasks;

use App\Http\Repositories\Order\OrderRepository;
use App\Services\Task;

class UpdateOrderTask extends Task
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($id, array $attributes)
    {
        return $this->repository->update($id, $attributes);
    }

  
}

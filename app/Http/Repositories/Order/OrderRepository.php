<?php

namespace App\Http\Repositories\Order;

use App\Http\Repositories\BaseRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface{
    public function getModel()
    {
        return Order::class;
    }

    public function list(){
        return $this->getAll();
    }
}
<?php 

namespace App\Http\Repositories\OrderDetail;

use App\Http\Repositories\BaseRepository;
use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface{
    public function getModel(){
        return OrderDetail::class;
    }

    public function list(){
        return $this->getAll();
    }
}
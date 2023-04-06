<?php

namespace App\Http\Repositories\Voucher;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Voucher\VoucherRepositoryInterface;
use App\Models\Voucher;

class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface{

    public function getModel(){
        return Voucher::class;
    }

    public function list(){
        return $this->getAll();
    }

    public function getProductBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
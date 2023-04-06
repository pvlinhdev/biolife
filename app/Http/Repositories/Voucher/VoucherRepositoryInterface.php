<?php

namespace App\Http\Repositories\Voucher;

interface VoucherRepositoryInterface{
    public function list();
    public function getProductBySlug($slug);
}
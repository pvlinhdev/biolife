<?php
namespace App\Services\Voucher\Actions;

use App\Services\Action;
use App\Services\Voucher\Tasks\CreateVoucherTask;

class CreateVoucherAction extends Action{
    public function __construct()
    {
        
    }

    

    public function create(array $attributes){
        return resolve(CreateVoucherTask::class)->create($attributes);
    }

    // public function getVoucherBySlug($slug){
    //     return resolve(ShowVoucherTask::class)->getVoucherBySlug($slug);
    // }
}
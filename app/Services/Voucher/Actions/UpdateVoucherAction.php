<?php
namespace App\Services\Voucher\Actions;

use App\Services\Action;
use App\Services\Voucher\Tasks\UpdateVoucherTask;

class UpdateVoucherAction extends Action{
    public function __construct()
    {
        
    }

    public function update($id, array $attributes){
        return resolve(UpdateVoucherTask::class)->update($id, $attributes);
    }

    // public function getVoucherBySlug($slug){
    //     return resolve(ShowVoucherTask::class)->getVoucherBySlug($slug);
    // }
}
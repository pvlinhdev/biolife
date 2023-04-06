<?php
namespace App\Services\Voucher\Actions;

use App\Services\Action;
use App\Services\Voucher\Tasks\ShowVoucherTask;

class ShowVoucherAction extends Action{
    public function __construct()
    {
        
    }

    public function run(){
        return resolve(ShowVoucherTask::class)->run();
    }

    public function find($id){
        return resolve(ShowVoucherTask::class)->find($id);
    }

    // public function getVoucherBySlug($slug){
    //     return resolve(ShowVoucherTask::class)->getVoucherBySlug($slug);
    // }
}
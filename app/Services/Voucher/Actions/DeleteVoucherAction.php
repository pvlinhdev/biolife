<?php
namespace App\Services\Voucher\Actions;

use App\Services\Action;
use App\Services\Voucher\Tasks\DeleteVoucherTask;

class DeleteVoucherAction extends Action{
    public function __construct()
    {
        
    }
    public function delete($id){
        return resolve(DeleteVoucherTask::class)->delete($id);
    }
    
}
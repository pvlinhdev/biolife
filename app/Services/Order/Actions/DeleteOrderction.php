<?php
namespace App\Services\Order\Actions;

use App\Services\Action;
use App\Services\Order\Tasks\DeleteOrderTask;

class DeleteOrderAction extends Action
{
    public function __construct()
    {
    }

    public function delete($id){
        return resolve(DeleteOrderTask::class)->delete($id);
    }

}
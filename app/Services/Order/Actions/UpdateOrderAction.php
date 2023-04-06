<?php
namespace App\Services\Order\Actions;

use App\Services\Action;
use App\Services\Order\Tasks\UpdateOrderTask;

class UpdateOrderAction extends Action
{
    public function __construct()
    {
    }

    public function update($id, array $attributes){
        return resolve(UpdateOrderTask::class)->update($id, $attributes);
    }


}
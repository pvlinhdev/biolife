<?php
namespace App\Services\OrderDetail\Actions;

use App\Services\Action;
use App\Services\OrderDetail\Tasks\ShowOrderDetailTask;

class ShowOrderDetailAction extends Action
{
    public function __construct()
    {
    }

    public function run()
    {
        return resolve(ShowOrderDetailTask::class)->run();
    }

    public function find($id)
    {
        return resolve(ShowOrderDetailTask::class)->find($id);
    }



}

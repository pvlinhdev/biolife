<?php
namespace App\Services\Order\Actions;

use App\Services\Action;
use App\Services\Order\Tasks\ShowOrderTask;

class ShowOrderAction extends Action
{
    public function __construct()
    {
    }

    public function run()
    {
        return resolve(ShowOrderTask::class)->run();
    }

    public function find($id)
    {
        return resolve(ShowOrderTask::class)->find($id);
    }



}

<?php
namespace App\Services\User\Action;

use App\Services\Action;
use App\Services\User\Task\ShowUserTask;

class ShowUserAction extends Action{
    public function getUserList(){
        return resolve(ShowUserTask::class)->getUserList();
    }

    public function find($id)
    {
        return resolve(ShowUserTask::class)->find($id);
    }

    public function getUserByEmail($email){

    }

    public function getUserByPhone($phone){
        
    }

    public function update($id, array $attributes){
        return resolve(ShowUserTask::class)->update($id, $attributes);
    }
}
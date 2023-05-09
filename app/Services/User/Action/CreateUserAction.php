<?php
namespace App\Services\User\Action;

use App\Services\Action;
use App\Services\User\Task\CreateUserTask;

class CreateUserAction extends Action{
    public function create(array $attributes){
        return resolve(CreateUserTask::class)->create($attributes);
    }
}
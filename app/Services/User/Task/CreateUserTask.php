<?php
namespace App\Services\User\Task;

use App\Http\Repositories\User\UserRepository;
use App\Services\Task;

class CreateUserTask extends Task{

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createUserByPhone($phone){
        //get info user form api by phone
        
    }

}
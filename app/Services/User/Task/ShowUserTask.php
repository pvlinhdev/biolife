<?php
namespace App\Services\User\Task;

use App\Http\Repositories\User\UserRepository;
use App\Services\Task;

class ShowUserTask extends Task{

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getUserList(){
        return $this->repository->list();
    }

}
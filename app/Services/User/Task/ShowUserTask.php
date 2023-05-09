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
    public function find($id)
    {
        return $this->repository->find($id);
    }
    public function update($id, array $attributes)
    {
        return $this->repository->update($id, $attributes);
    }
}
<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface{
    public function getModel()
    {
        return User::class;
    }

    public function list(){
        return $this->getAll();
    }
}
<?php
namespace App\Services\Product\Actions;

use App\Services\Action;
use App\Services\Product\Tasks\CreateProductTask;

class CreateProductAction extends Action{
    public function __construct()
    {
        
    }
    public function create(array $attributes){
        return resolve(CreateProductTask::class)->create($attributes);
    }

}
<?php
namespace App\Services\Category\Actions;

use App\Services\Action;
use App\Services\Category\Tasks\CreateCategoryTask;

class CreateCategoryAction extends Action
{
    public function __construct()
    {
    }

    public function create(array $attributes){
        return resolve(CreateCategoryTask::class)->create($attributes);
    }
}

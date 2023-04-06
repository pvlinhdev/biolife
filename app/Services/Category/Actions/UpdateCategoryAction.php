<?php
namespace App\Services\Category\Actions;

use App\Services\Action;
use App\Services\Category\Tasks\UpdateCategoryTask;

class UpdateCategoryAction extends Action
{
    public function __construct()
    {
    }

    public function update($id, array $attributes){
        return resolve(UpdateCategoryTask::class)->update($id, $attributes);
    }

    public function updateCategoryMedia($category, $request){
        resolve(UpdateCategoryTask::class)->updateCategoryMedia($category, $request);
    }
}
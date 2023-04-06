<?php
namespace App\Services\Category\Actions;

use App\Services\Action;
use App\Services\Category\Tasks\DeleteCategoryTask;

class DeleteCategoryAction extends Action
{
    public function __construct()
    {
    }

    public function delete($id){
        return resolve(DeleteCategoryTask::class)->delete($id);
    }

}
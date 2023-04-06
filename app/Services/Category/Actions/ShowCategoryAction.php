<?php
namespace App\Services\Category\Actions;

use App\Services\Action;
use App\Services\Category\Tasks\ShowCategoryTask;

class ShowCategoryAction extends Action
{
    public function __construct()
    {
    }

    public function run()
    {
        return resolve(ShowCategoryTask::class)->run();
    }
    public function find($id)
    {
        return resolve(ShowCategoryTask::class)->find($id);
    }

    public function getCategoryBySlug($slug)
    {
        return resolve(ShowCategoryTask::class)->getCategoryBySlug($slug);
    }


}

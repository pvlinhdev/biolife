<?php
namespace App\Services\Product\Actions;

use App\Services\Action;
use App\Services\Product\Tasks\DeleteProductTask;

class DeleteProductAction extends Action{
    public function __construct()
    {
        
    }
    public function delete($id){
        return resolve(DeleteProductTask::class)->delete($id);
    }

}
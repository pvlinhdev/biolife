<?php
namespace App\Services\Product\Actions;

use App\Services\Action;
use App\Services\Product\Tasks\ShowProductTask;

class ShowProductAction extends Action{
    public function __construct()
    {
        
    }

    public function run(){
        return resolve(ShowProductTask::class)->run(); 
    }

    public function getSingleProduct($id){
        return resolve(ShowProductTask::class)->getSingleProduct($id);
    }

    public function getProductBySlug($slug){
        return resolve(ShowProductTask::class)->getProductBySlug($slug);
    }

    public function getProductByName($name){
        return resolve(ShowProductTask::class)->getProductByName($name);
    }
}
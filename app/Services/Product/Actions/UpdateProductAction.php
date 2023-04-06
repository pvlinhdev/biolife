<?php
namespace App\Services\Product\Actions;

use App\Services\Action;
use App\Services\Product\Tasks\UpdateProductTask;

class UpdateProductAction extends Action{
    public function __construct()
    {
        
    }
    public function update($id,array $attributes){
        return resolve(UpdateProductTask::class)->update($id,$attributes);
    }
    
    public function updateProductMedia($product, $request){
       return resolve(UpdateProductTask::class)->updateProductMedia($product, $request);
    }
}
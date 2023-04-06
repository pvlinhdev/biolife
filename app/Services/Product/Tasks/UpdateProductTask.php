<?php
namespace App\Services\Product\Tasks;

use App\Http\Repositories\Product\ProductRepository;
use App\Services\Task;

class UpdateProductTask extends Task{

    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($id,array $attributes){
        return $this->repository->update($id,$attributes);
    }
    public function updateProductMedia($product, $request)
    {
        if ($request->hasFile('image')) {
            $product->clearMediaCollection('products_images');
            $product->addMediaFromRequest('image')->usingName($product->name)->toMediaCollection('products_images');
        }
    }

}
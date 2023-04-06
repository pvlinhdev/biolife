<?php
namespace App\Services\Voucher\Tasks;

use App\Http\Repositories\Voucher\VoucherRepository;
use App\Services\Task;

class CreateVoucherTask extends Task{

    private $repository;

    public function __construct(VoucherRepository $repository)
    {
        $this->repository = $repository;
    }

    

    public function create(array $attributes){
        return $this->repository->create($attributes);
    }
    
    // public function getVoucherBySlug($slug){
    //     return  $this->repository->getVoucherBySlug($slug);
    // }
}
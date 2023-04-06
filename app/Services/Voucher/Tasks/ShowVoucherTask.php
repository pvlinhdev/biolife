<?php
namespace App\Services\Voucher\Tasks;

use App\Http\Repositories\Voucher\VoucherRepository;
use App\Services\Task;

class ShowVoucherTask extends Task{

    private $repository;

    public function __construct(VoucherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(){
        return $this->repository->list();
    }

    public function find($id){
        return $this->repository->find($id);
    }
    
    
    // public function getVoucherBySlug($slug){
    //     return  $this->repository->getVoucherBySlug($slug);
    // }
}
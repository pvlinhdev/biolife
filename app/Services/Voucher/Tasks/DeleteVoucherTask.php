<?php
namespace App\Services\Voucher\Tasks;

use App\Http\Repositories\Voucher\VoucherRepository;
use App\Services\Task;

class DeleteVoucherTask extends Task{

    private $repository;

    public function __construct(VoucherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete($id){
        return $this->repository->delete($id);
    }
}
<?php
namespace App\Services\Voucher\Tasks;

use App\Http\Repositories\Voucher\VoucherRepository;
use App\Services\Task;

class UpdateVoucherTask extends Task{

    private $repository;

    public function __construct(VoucherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($id, array $attributes){
        return $this->repository->update($id, $attributes);
    }
}
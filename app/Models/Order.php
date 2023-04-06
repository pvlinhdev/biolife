<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'status', 'user_id', 'receivership_id', 'voucher_id'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        
    public function vouchers(){
        return $this->belongsTo(Voucher::class);
    }

    public function receivership()
    {
        return $this->belongsTo(Receivership::class);
    }
}

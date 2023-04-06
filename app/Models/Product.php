<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'price', 'quantity', 'description', 'category_id','sold','views'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class);
    } 
    
    public static function booted(){
        static::created(function ($product){
            $product->slug = Str::slug($product->name) . '-' . $product->id;
            $product->save();
        });
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

// class Category extends Model implements HasMedia
class Category extends Model
{
    use HasFactory;
    // use HasFactory, InteractsWithMedia;
    protected $fillable = ['name','slug','description'];
    
    public function products(){
        return $this->hasMany(Product::class);
    }
    
    public static function booted(){
        static::created(function ($category){
            $category->slug = Str::slug($category->name) . '-' . $category->id;
            $category->save();
        });
        
    }
}

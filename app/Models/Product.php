<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'product_code', 
        'description', 
    ];
    public function product() {
        return $this->hasMany(Product::class);
    }

    
}

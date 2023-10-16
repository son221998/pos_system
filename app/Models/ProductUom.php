<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductUom;

class ProductUom extends Model
{
    use HasFactory;
    protected $table ='product_uoms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id', 
        'uom_id',
        'unit_cost',
        'sell_price',
        'discount', 
    ];
    public function product() {
        return $this->belongsTo(ProductUom::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uom;
class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'product_code', 
        'uom', 
        'description', 
        'unit_cost', 
        'sell_price', 
        'discpunt', 
        'updated_at', 
        'created_at'
    ];
    public function uom() {
        return $this->belongsTo(Uom::class);
    }
}

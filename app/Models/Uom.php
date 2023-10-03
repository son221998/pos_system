<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Uom;

class Uom extends Model
{
    use HasFactory;
    protected $table ='uoms';
    protected $primaryKey = 'id';
    Protected $fillable = [
        'id',
        'name',
    ];

    public function products() {
        return $this->hasMany(Product::class, 'uom_id', 'id');
    }
}

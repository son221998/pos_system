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
    protected $fillable = [
        'id',
        'name',
    ];

    public function products() {
        return $this->belongsTo(Uom::class);
    }
}

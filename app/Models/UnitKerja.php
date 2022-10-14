<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'm_unitkerja'; 
    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'product');
    }

    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'm_layanan_informasi'; 
    protected $guarded = [
        'id',
    ];

    // public function product()
    // {
    //     return $this->hasMany('App\Product', 'product');
    // }
    public function scopeFilter ($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('name', 'like', '%' . $filters['search'] . '%')
        //                  ->orWhere('unitkerja', 'like', '%' . $filters['search'] . '%')
        //                  ->orWhere('detail', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('unitkerja', 'like', '%' . $search . '%')
                         ->orWhere('detail', 'like', '%' . $search . '%');
        });
    }
    
}
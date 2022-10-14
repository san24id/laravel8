<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $dates = ['permintaan_at'];
    protected $guarded = ['id'];


    public function breaks()
    {
        return $this->belongsTo(Breaks::class);
        
    }

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class);
        
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
        
    }

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
        
        //versi callback
        // $query->when($filters['unitkerja'] ?? false, function($query, $unitkerja) {
        //     return $query->whereHas('unitkerja', function($query) use ($unitkerja) {  
        //         $query->where('name', $unitkerja);
        //     });
        // });    

        // versi arrow function
        // $query->when($filters['jabatan'] ?? false, fn($query, $jabatan) =>
        //     $query->whereHas('jabatan', fn($query) =>
        //         $query->where('name', $jabatan)
        //     )
        // );

    }
}

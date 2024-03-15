<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{       
    protected $guarded = [
        'id',
        'timestamps'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    use HasFactory;
}

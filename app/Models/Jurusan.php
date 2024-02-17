<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $guarded = [
        'id',
        'timestamps'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    use HasFactory;
}

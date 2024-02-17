<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
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

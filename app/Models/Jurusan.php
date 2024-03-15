<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id',
        'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    use HasFactory;
}
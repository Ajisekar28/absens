<?php

namespace App\Models; 
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class);
    }

    use Notifiable;


    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
        if (Is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public static function hasRole($role)
    {
        if (auth()->user()->roles()->first()->slug === $role) {
            return true;
        }
        return false;
    }


    protected $fillable = [
        'name', 'email', 'password', 'pin_code',
    ];

  
    protected $hidden = [
        'pin_code','password', 'remember_token',
    ];

  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

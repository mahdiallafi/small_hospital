<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function Reports(){
        
            return $this->hasMany(Report::class);
        
    }
    public function appointments(){
        
            return $this->hasMany(Appointment::class);
        
    }
    public function statues(){
        return $this-> hasMany(Statues::class);
    }
    public function notifications(){
        return $this-> hasMany(Notfication::class);
    }
    public function midtable(){
        return $this->belongsToMany(Sercode::class);
    }
}

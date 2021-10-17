<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $fillable=[
'service_name','clinic_name','clinic_location',

    ];
    public function doctors(){
        return $this-> hasMany(Doctor::class);
    }
    public function midtable(){
        return $this->belongsToMany(Sercode::class);
    }
}

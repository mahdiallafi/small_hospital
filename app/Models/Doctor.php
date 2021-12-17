<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=[
        'clinic_name','clinic_location','Free_days','service_id','user_id',
      
    ];
    public function services(){
       
       return $this->belongsTo(service::class);
        
    }
    public function servicenames()
{
    return $this->belongsTo(service::class,'service_id');
}
public function notifications(){
    return $this-> hasMany(Appointment::class);
}
}

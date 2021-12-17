<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[
'app_date','app_time','Fre_places','user_id','doctor_id',
    ];
    
    public function users(){
        
            return $this->belongsTo(User::class);
        
    }
    public function username(){
        
            return $this->belongsTo(User::class,'user_id');
        
    }
    public function doctorname(){
        
            return $this->belongsTo(Doctor::class,'doctor_id');
        
    }

    public function doctors(){
        
            return $this->belongsTo(Doctor::class);
        
    }
}

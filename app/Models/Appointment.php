<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[
'app_date','app_time','Fre_places','user_id',
    ];
    
    public function users(){
        
            return $this->belongsTo(User::class);
        
    }
}

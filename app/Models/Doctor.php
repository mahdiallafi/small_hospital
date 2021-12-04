<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','age','eamil','Free_days','service_id',
    ];
    public function services(){
       
       return $this->belongsTo(service::class);
        
    }
}

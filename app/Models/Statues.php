<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statues extends Model
{
    use HasFactory;
    protected $fillable=[
        'Code_number','medcine','Description_statues','user_id',
    
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
}

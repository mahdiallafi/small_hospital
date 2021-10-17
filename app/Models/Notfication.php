<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notfication extends Model
{
    use HasFactory;
    protected $fillable=[
        'body','user_id',
       
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
}

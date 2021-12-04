<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable=[
'title','body','user_id',
    ];
public function users(){
    {
   return $this->belongsTo(User::class);
    }
}
public function userreport()
{
    return $this->belongsTo(User::class,'user_id');
}

}

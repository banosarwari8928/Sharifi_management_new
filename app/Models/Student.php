<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "lasrName",
        "user_id",
        "phone_number"
    ];
    public function user(){
        return $this->belongsTo(user::class , 'user_id');
    }
    public function payment(){
        return $this->hasMany(payment::class , 'student_id');
    }
}

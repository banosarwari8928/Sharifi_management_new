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
        return $this->belongsTo(User::class , 'user_id');
    }
    public function sinfs(){
        return $this->belongsToMany(Sinf::class , 'sinf_id');
    }
    public function payment(){
        return $this->hasMany(Payment::class , 'student_id');
    }
}

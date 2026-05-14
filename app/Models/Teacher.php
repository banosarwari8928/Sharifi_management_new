<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        "lastName",
        "degree_of_ducation",
        "phone_number",
        "image_url",
        "bio",
        "user_id"
    ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function salairy(){
        return $this->hasMany(salarie::class , 'teacher_id');
    }
    public function sinf(){
        return $this->hasMany(sinf::class , 'teacher_di');
    }
}

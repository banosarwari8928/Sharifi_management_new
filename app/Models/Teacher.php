<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        "last_name",
        "degree_of_education",
         "image_url",
        "phone_number",
        "bio",
        "user_id"
    ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function salary(){
        return $this->hasMany(Salary::class , 'teacher_id');
    }
    public function sinf(){
        return $this->hasMany(Sinf::class , 'teacher_id');
    }
}

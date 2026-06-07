<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        "lastName",
        "degree_of_education",
        "phone_number",
        "image_url",
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sinf extends Model
{
    protected $fillable = [
        "title",
        "start_date ",
        "end_date ",
        "description",
        "banner_url",
        "teacher_id"
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class , 'teacher_id');
    }
    public function payment(){
        return $this->hasMany(payment::class , 'sinf_id');
    }
    public function student() {
        return $this->belongsToMany(Student::class,"student_id");
    }
}

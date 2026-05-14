<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salarie extends Model
{
    protected $fillable = [
        "year",
        "month",
        "day",
        "amount",
        "teacher_id"
    ];
    public function teacher(){
        return $this->belongsTo(salarie::class , 'teacher_id');
    }
}

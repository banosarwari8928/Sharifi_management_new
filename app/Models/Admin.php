<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        "lastName",
        "bio",
        "image_url",
        "user_id"
    ];
    public function user(){
        return $this->belongsTo(user::class , 'user_id');
    }
}

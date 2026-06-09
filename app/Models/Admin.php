<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        "last_name",
        "image_url",
        "bio",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

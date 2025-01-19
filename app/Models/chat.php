<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $fillable = [
        "first_user_id",
        "second_user_id",
        "content"
    ];

    public function initiator()
    {
        return $this->belongsTo(User::class, 'first_user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'second_user_id');
    }
}

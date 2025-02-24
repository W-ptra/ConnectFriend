<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->belongsToMany(User::class,"user_hobby","hobby_id","user_id");
    }
}

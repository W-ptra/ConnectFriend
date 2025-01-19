<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'instagram',
        'mobile_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hobbies(){
        return $this->belongsToMany(Hobby::class,'user_hobby',"user_id","hobby_id");
    }

    public function friends(){
        return $this->belongsToMany(User::class,'friends','user_id','friend_id');
    }

    public function initiatedChats()
    {
        return $this->hasMany(Chat::class, 'first_user_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'second_user_id');
    }

    public function allChats()
    {
        return Chat::where('first_user_id', $this->id)
                   ->orWhere('second_user_id', $this->id);
    }
}

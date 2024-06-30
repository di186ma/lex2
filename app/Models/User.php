<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone_number',
        'email',
        'age',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasMany;
//
//class user extends Model
//{
//    protected $table = 'users';
//    protected $fillable = [
//        'last_name', 'first_name', 'middle_name',
//        'phone_number', 'email', 'age', 'username',
//    ];
//
//    protected $hidden = [
//        'password',
//    ];
//    use HasFactory;
//    public function queries(): HasMany
//    {
//        return $this->hasMany(query::class);
//    }
//
//    public function chats()
//    {
//        return $this->hasMany(chat::class);
//    }
//
//    public function ratings()
//    {
//        return $this->hasMany(rating::class);
//    }
//}

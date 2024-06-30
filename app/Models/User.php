<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class user extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'last_name', 'first_name', 'middle_name',
        'phone_number', 'email', 'age', 'username',
    ];

    protected $hidden = [
        'password',
    ];
    use HasFactory;
    public function queries(): HasMany
    {
        return $this->hasMany(query::class);
    }

    public function chats()
    {
        return $this->hasMany(chat::class);
    }

    public function ratings()
    {
        return $this->hasMany(rating::class);
    }
}

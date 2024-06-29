<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table = 'chats';
    protected $fillable = [
        'query_id', 'user_id', 'lawyer_id', 'admin_id', 'message',
    ];

    public function query()
    {
        return $this->belongsTo(query::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function lawyer()
    {
        return $this->belongsTo(lawyer::class);
    }

    public function admin()
    {
        return $this->belongsTo(admin::class);
    }
}

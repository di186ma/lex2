<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = [
        'query_id', 'user_id', 'lawyer_id', 'rating',
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
}

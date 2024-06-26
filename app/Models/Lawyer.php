<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lawyer extends Model
{
    use HasFactory;

    public function queries(): BelongsToMany
    {
        return $this->belongsToMany(Query::class, 'query_assignments');
    }

//    public function query(): HasMany
//    {
//        return $this->hasMany(query::class);
//    }
}

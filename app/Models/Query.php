<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Query extends Model
{
    use HasFactory;

    // Отношение принадлежности к администратору
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    public function lawyers(): BelongsToMany
    {
        return $this->belongsToMany(Lawyer::class, 'query_assignments');
    }
}

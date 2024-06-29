<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;

    // Отношение один ко многим с запросами
    public function queries(): HasMany
    {
        return $this->hasMany(Query::class);
    }
}

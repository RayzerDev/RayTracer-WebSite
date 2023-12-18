<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scene extends Model
{
    use HasFactory;

    protected function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, "idScene");
    }

    protected function notes(): HasMany
    {
        return $this->hasMany(Note::class, "idScene");
    }
    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

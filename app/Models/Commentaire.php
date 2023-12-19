<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "idUser");
    }

    protected function scene(): BelongsTo
    {
        return $this->belongsTo(Scene::class, "idScene");
    }
}

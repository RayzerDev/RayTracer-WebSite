<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scene extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, "idScene");
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'idScene');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    public function noteUser($idUser)
    {
        return $this->notes()->where('idUser',$idUser)->first();
    }
}

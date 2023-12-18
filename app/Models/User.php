<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    protected function scenes(): HasMany
    {
        return $this->hasMany(Scene::class, "idUser");
    }

    protected function favoris(): BelongsToMany
    {
        return $this->belongsToMany(Scene::class, 'favori', "idUser");
    }

    protected function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, "idUser");
    }

    protected function notes(): HasMany
    {
        return $this->hasMany(Note::class, "idUser");
    }

}

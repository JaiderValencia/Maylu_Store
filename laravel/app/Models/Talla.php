<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talla extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
    ];

    public function prendas(): BelongsToMany
    {
        return $this->belongsToMany(Prenda::class, 'prenda_tallas')->withTimestamps();
    }

    public function prendaTallas(): HasMany
    {
        return $this->hasMany(PrendaTalla::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Prenda extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'ruta_imagen',
        'descripcion',
        'precio',
        'categoria_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
        ];
    }

    protected static function booted(): void
    {
        static::deleting(function (Prenda $prenda) {
            // Pivot rows are removed via FK cascade; only the stored image is cleaned here.
            if ($prenda->ruta_imagen) {
                Storage::disk('public')->delete($prenda->ruta_imagen);
            }
        });
    }

    public function tallas(): BelongsToMany
    {
        return $this->belongsToMany(Talla::class, 'prenda_tallas')->withTimestamps();
    }

    public function prendaTallas(): HasMany
    {
        return $this->hasMany(PrendaTalla::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarritoPrenda extends Model
{
    use HasFactory;

    protected $table = 'carrito_prenda';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'prenda_talla_id',
        'carrito_id',
        'cantidad',
    ];

    public function carrito(): BelongsTo
    {
        return $this->belongsTo(Carrito::class);
    }

    public function prendaTalla(): BelongsTo
    {
        return $this->belongsTo(PrendaTalla::class);
    }
}

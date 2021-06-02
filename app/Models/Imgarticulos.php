<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgarticulos extends Model
{
    use HasFactory;
    // Instancio la tabla 'img_bicicletas'
    protected $table = 'img_articulos';

    // Declaro los campos que usaré de la tabla 'img_bicicletas'
    protected $fillable = ['nombre', 'formato', 'articulos_id'];

    // Relación Inversa (Opcional)
    public function articulo()
    {
        return $this->belongsTo(Articulos::class);
    }
}

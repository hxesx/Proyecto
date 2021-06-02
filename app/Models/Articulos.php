<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    // Instancio la tabla 'bicicletas'
    protected $table = 'articulos';

    // Declaro los campos que usaré de la tabla 'bicicletas'
    protected $fillable = ['nombre', 'precio', 'stock', 'imagenes', 'url'];

    // Relación One to Many (Uno a muchos), un registro puede tener muchas imágenes
    public function imagenesarticulos()
    {
        return $this->hasMany('App\Models\Imgarticulos');
    }

}

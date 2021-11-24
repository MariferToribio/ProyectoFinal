<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo', 'autor', 'categoria', 'descripcion', 'cantidad', 'precio', 'imagen', 'editorial_id'];
    
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
        #Estoy en instancia de persona, puedo acceder a metodo user para acceder a la informacion del usuario
    }
    public function autors()
    {
        return $this->belongsToMany(Autor::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'observacion'];

    //public $timestamps = false;

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }
}

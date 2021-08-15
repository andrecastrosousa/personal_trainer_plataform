<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoExercicio extends Model
{
    use HasFactory;

    public function exercicios ()
    {
        return $this->hasMany(Exercicio::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    public function tipoExercicios()
    {
        return $this->belongsToMany(TipoExercicio::class);
    }

    public static function createExercicio(string $nome, ?string $musculos, TipoExercicio $tipoExercicio, ?TipoExercicio $tipoExercicio2, string $pathFotoVideo)
    {
        $exercicio = new Exercicio();
        $exercicio->foto_video = $pathFotoVideo;
        $exercicio->nome = $nome;
        $exercicio->musculos = $musculos;

        $exercicio->save();

        $exercicio->tipoExercicios()->attach($tipoExercicio);
        if($tipoExercicio2 != null)
            $exercicio->tipoExercicios()->attach($tipoExercicio2);
    }

    public function updateExercicio(string $nome, ?string $musculos, ?TipoExercicio $tipoExercicio, ?TipoExercicio $tipoExercicio2, string $pathFotoVideo)
    {
        if($pathFotoVideo != "")
            $this->foto_video = $pathFotoVideo;
        $this->nome = $nome;
        $this->musculos = $musculos;

        $this->save();
        if($tipoExercicio != null)
            $this->tipoExercicios()->attach($tipoExercicio);
        if($tipoExercicio2 != null)
            $this->tipoExercicios()->attach($tipoExercicio2);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;

    public function planoTreino () {
        return $this->belongsTo(PlanoTreino::class);
    }

    public function dias() {
        return $this->hasMany(DiaExercicio::class);
    }

    public static function createDia($plano, array $exerciciosDia, int $dia, string $tituloDia)
    {
        $diaPlano = new Dia();
        $diaPlano->numero = $dia;
        $diaPlano->titulo = $tituloDia;

        $diaPlano->planoTreino()->associate($plano);

        $diaPlano->save();

        DiaExercicio::createDiaExercicio($diaPlano, $exerciciosDia);
    }

    public function addDia($exerciciosDia, $dia, $tituloDia)
    {

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaExercicio extends Model
{
    use HasFactory;

    public function dia () {
        return $this->belongsTo(Dia::class);
    }

    public function exercicio () {
        return $this->belongsTo(Exercicio::class);

    }

    public static function createDiaExercicio(Dia $diaPlano, array $exerciciosDia)
    {
        foreach ($exerciciosDia as $exercicioDia) {
            $diaExercicio = new DiaExercicio();
            $exercicio = Exercicio::find($exercicioDia[0]);
            $diaExercicio->rep = $exercicioDia[1];
            $diaExercicio->carga = $exercicioDia[4];
            $diaExercicio->serie = $exercicioDia[2];
            $diaExercicio->tempo_desc = $exercicioDia[3];
            $diaExercicio->tecnica = $exercicioDia[5];
            if($exercicioDia[6] != null)
                $diaExercicio->observacoes = $exercicioDia[6];
            $diaExercicio->exercicio()->associate($exercicio);
            $diaExercicio->dia()->associate($diaPlano);
            $diaExercicio->save();
        }
    }

    public function updateDiaExercicio(array $diaExercicio)
    {
        $this->rep = $diaExercicio[1];
        $this->carga = $diaExercicio[4];
        $this->serie = $diaExercicio[2];
        $this->tempo_desc = $diaExercicio[3];
        if($diaExercicio[5] != null)
            $this->observacoes = $diaExercicio[5];
        $this->save();
    }
}

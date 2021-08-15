<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    public static function createObjetivoCliente(?string $objetivo1, ?string $objetivo2, ?string $objetivo3, ?string $objetivo4, ?string $objetivo5, ?string $objetivoOutro)
    {
        $o = new Objetivo();

        if($objetivo1 != null)
            $o->perder_peso = $objetivo1;
        if($objetivo2 != null)
            $o->hipertrofia = $objetivo2;
        if($objetivo3 != null)
            $o->melhorar_condicao = $objetivo3;
        if($objetivo4 != null)
            $o->melhorar_mental = $objetivo4;
        if($objetivo5 != null)
            $o->outro = $objetivo5;
            $o->outro_objetivo = $objetivoOutro;

        $o->save();

        return $o;
    }
}

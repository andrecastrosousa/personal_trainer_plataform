<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnamneseClinica extends Model
{
    use HasFactory;

    public static function createAnamneseCliente(?string $clinica1, ?string $clinica2, ?string $clinica3, ?string $clinica4, ?string $clinica5, ?string $clinica6, ?string $clinica7, ?string $clinica8, ?string $clinica9, ?string $clinica10, ?string $clinica11, ?string $clinica12, ?string $clinica13, ?string $clinica14, ?string $clinicaOutro)
    {
        $ac = new AnamneseClinica();
        if($clinica1 != null)
            $ac->asma = $clinica1;
        if($clinica2 != null)
            $ac->cardiorrespiratorias = $clinica2;
        if($clinica3 != null)
            $ac->depressao = $clinica3;
        if($clinica4 != null)
            $ac->diabetes = $clinica4;
        if($clinica5 != null)
            $ac->hipertensao = $clinica5;
        if($clinica6 != null)
            $ac->hipotensao = $clinica6;
        if($clinica7 != null)
            $ac->lesoes = $clinica7;
        if($clinica8 != null)
            $ac->musculares = $clinica8;
        if($clinica9 != null)
            $ac->osteoarticulares = $clinica9;
        if($clinica10 != null)
            $ac->pressao_arterial = $clinica10;
        if($clinica11 != null)
            $ac->problemas_coluna = $clinica11;
        if($clinica12 != null)
            $ac->tiroide = $clinica12;
        if($clinica13 != null)
            $ac->renais = $clinica13;
        if($clinica14 != null)
            $ac->outro = $clinica14;
            $ac->outro_anamnese = $clinicaOutro;

        $ac->save();

        return $ac;
    }
}

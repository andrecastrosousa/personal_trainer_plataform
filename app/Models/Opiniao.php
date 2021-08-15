<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opiniao extends Model
{
    use HasFactory;

    public static function createOpiniao(?bool $opiniao1, ?bool $opiniao2, ?bool $opiniao3, ?bool $opiniao4, ?bool $opiniao5, ?bool $opiniao6, ?bool $opiniao7, ?bool $opiniao8, ?bool $opiniao9, ?bool $outraOpiniao)
    {
        $opiniao = new Opiniao();
        if($opiniao1 != null)
            $opiniao->divertidos = $opiniao1;
        if($opiniao2 != null)
            $opiniao->monotonos = $opiniao2;
        if($opiniao3 != null)
            $opiniao->desafiantes = $opiniao3;
        if($opiniao4 != null)
            $opiniao->faceis = $opiniao4;
        if($opiniao5 != null)
            $opiniao->dificeis = $opiniao5;
        if($opiniao6 != null)
            $opiniao->educacionais = $opiniao6;
        if($opiniao7 != null)
            $opiniao->eficazes = $opiniao7;
        if($opiniao8 != null)
            $opiniao->ineficazes = $opiniao8;
        if($opiniao9 != null) {
            $opiniao->outra = $opiniao9;
            $opiniao->opiniao_outro = $outraOpiniao;
        }
        $opiniao->save();
        return $opiniao;
    }
}

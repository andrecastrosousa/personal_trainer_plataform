<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosProgresso extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createFotosCliente(string $pathFotoFrente, string $pathFotoLado, string $pathFotoCostas, $cliente, string $titulo)
    {
        $f = new FotosProgresso();
        $f->titulo = $titulo;
        $f->foto_frente = $pathFotoFrente;
        $f->foto_lado = $pathFotoLado;
        $f->foto_costas = $pathFotoCostas;

        $f->user()->associate($cliente);
        printf($f);
        $f->save();
    }

    public function atualizarFotosProgresso(string $pathFotoFrente, string $pathFotoLado, string $pathFotoCostas, $titulo)
    {
        if($pathFotoFrente != "")
            $this->foto_frente = $pathFotoFrente;
        if($pathFotoLado != "")
            $this->foto_lado = $pathFotoLado;
        if($pathFotoCostas != "")
            $this->foto_costas = $pathFotoCostas;

        $this->titulo = $titulo;
        $this->save();
    }
}

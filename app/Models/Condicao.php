<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicao extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createCondicaoCliente(?int $cintura, ?int $peso, ?int $coxa, ?int $quadril, ?int $abs, ?int $braco, ?int $peito, $cliente)
    {
        $c = new Condicao();
        $c->peso = $peso;
        $c->cintura = $cintura;
        $c->coxa = $coxa;
        $c->quadril = $quadril;
        $c->abdominal = $abs;
        $c->braco = $braco;
        $c->peito = $peito;
        printf($cliente);
        $c->user()->associate($cliente);
        $c->save();

    }

    public function updateCondicao($peso, $cintura, $coxa, $quadril, $abdominal, $braco, $peito)
    {
        $this->peso = $peso;
        $this->cintura = $cintura;
        $this->coxa = $coxa;
        $this->quadril = $quadril;
        $this->abdominal = $abdominal;
        $this->braco = $braco;
        $this->peito = $peito;
        $this->save();

    }
}

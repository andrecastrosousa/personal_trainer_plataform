<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createTarefa($user)
    {
        $t = new Tarefa();
        $t->user()->associate($user);
        $t->save();
    }

    public function tarefaMade($nomeTarefa)
    {
        if($nomeTarefa == "avaliacao_inicial")
            $this->avaliacao_inicial = 1;
        else if($nomeTarefa == "plano_treino")
            $this->plano_treino = 1;
        else if($nomeTarefa == "dicas_alimentar")
            $this->dicas_alimentar = 1;
        else if($nomeTarefa == "feedback_semanal")
            $this->feedback_semanal = 1;
        else if($nomeTarefa == "avaliacao_periodica")
            $this->avaliacao_periodica = 1;
        $this->save();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function opiniao()
    {
        return $this->belongsTo(Opiniao::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createFeedback(int $cansaco, int $fome, int $sono, int $humor, int $motivacao, int $stress, int $satisfacao, Opiniao $opiniao, int $recomendacao, int $satisfacaoTreino, ?string $feedback, User $cliente)
    {
        $f = new Feedback();
        $f->cansaco = $cansaco;
        $f->fome = $fome;
        $f->sono = $sono;
        $f->humor = $humor;
        $f->motivacao = $motivacao;
        $f->stress = $stress;
        $f->satisfacao = $satisfacao;
        $f->recomendacao = $recomendacao;
        $f->satisfacao_treino = $satisfacaoTreino;
        $f->feedback = $feedback;
        $f->opiniao()->associate($opiniao);
        $f->user()->associate($cliente);

        $f->save();
    }
}

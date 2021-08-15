<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoInicial extends Model
{
    use HasFactory;

    public function anamneseClinica()
    {
        return $this->belongsTo(AnamneseClinica::class);
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function createAvaliacaoCliente(int $horasTrabalho, int $horasSono, int $sedentarismo, int $motivacao, int $treino, string $parq1, string $parq2, string $parq3, string $parq4, string $parq5, string $parq6, ?string $razaoAtividade, ?string $questaoCirurgia, string $questaoGravida, ?string $questaoMedicacao, string $anamneseDesportiva1, string $anamneseDesportiva2, string $questaoTrabalho, ?string $outroTrabalho, ?string $observacoes, $anamneseClinica, $objetivo)
    {
        $a = new AvaliacaoInicial();
        $a->horas_trabalho = $horasTrabalho;
        $a->horas_diarias = $horasSono;
        $a->sedentarismo = $sedentarismo;
        $a->motivacao = $motivacao;
        $a->treinos_semana = $treino;
        $a->parq1 = $parq1;
        $a->parq2 = $parq2;
        $a->parq3 = $parq3;
        $a->parq4 = $parq4;
        $a->parq5 = $parq5;
        $a->parq6 = $parq6;
        $a->questao_atividade = $razaoAtividade;
        $a->questao_cirurgia = $questaoCirurgia;
        $a->questao_medicacao = $questaoMedicacao;
        $a->questao_gravidez = $questaoGravida;
        $a->anamnese_desportiva1 = $anamneseDesportiva1;
        $a->anamnese_desportiva2 = $anamneseDesportiva2;
        $a->questao_trabalho = $questaoTrabalho;
        $a->questao_trabalho_outro = $outroTrabalho;
        $a->observacoes = $observacoes;

        $a->anamneseClinica()->associate($anamneseClinica);
        $a->objetivo()->associate($objetivo);

        $a->save();
        return $a;
    }
}

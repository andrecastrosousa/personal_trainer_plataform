<?php


namespace App\Models;


class PlanoTreinoHandler
{
    public function getPlanosTreino()
    {
        return PlanoTreino::all();
    }

    public function getPlanoCliente(int $idCliente)
    {
        return PlanoTreino::where("user_id", $idCliente)->latest()->first();
    }

    public function criarPlano(int $clienteId, string $objetivo)
    {
        $cliente = User::find($clienteId);
        PlanoTreino::createPlano($cliente, $objetivo);
        $tarefa = Tarefa::where('user_id', $cliente->id)->first();
        $tarefa->tarefaMade("plano_treino");
    }

    public function criarPlanoDiasExercicios(int $clienteId, int $planoId, array $exerciciosDia, int $dia, $tituloDia)
    {
        $cliente = User::find($clienteId);
        $plano = PlanoTreino::where("user_id", $clienteId)->latest()->first();

        Dia::createDia($plano, $exerciciosDia, $dia, $tituloDia);
    }

    public function getDiaPlanoCliente(int $dia)
    {
        return Dia::find($dia);
    }

    public function updateDiaPlano(array $arr)
    {
        foreach($arr as $diaExercicio) {
            $dia = DiaExercicio::find($diaExercicio[0]);
            $dia->updateDiaExercicio($diaExercicio);
        }
    }

    public function getPlanoClienteSelecionado(int $idPlano)
    {
        return PlanoTreino::find($idPlano);
    }
}

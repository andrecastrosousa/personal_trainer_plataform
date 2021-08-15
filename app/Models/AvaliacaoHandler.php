<?php


namespace App\Models;


class AvaliacaoHandler
{

    public static function getFeedbacks()
    {
        return Feedback::all();
    }

    public function createAnamneseAvaliacao(?string $clinica1, ?string $clinica2, ?string $clinica3, ?string $clinica4, ?string $clinica5, ?string $clinica6, ?string $clinica7, ?string $clinica8, ?string $clinica9, ?string $clinica10, ?string $clinica11, ?string $clinica12, ?string $clinica13, ?string $clinica14, ?string $clinicaOutro)
    {
        return AnamneseClinica::createAnamneseCliente($clinica1, $clinica2, $clinica3, $clinica4, $clinica5, $clinica6, $clinica7, $clinica8, $clinica9, $clinica10, $clinica11, $clinica12, $clinica13, $clinica14, $clinicaOutro);
    }

    public function criarObjetivoAvaliacao(?string $objetivo1, ?string $objetivo2, ?string $objetivo3, ?string $objetivo4, ?string $objetivo5, ?string $objetivoOutro)
    {
        return Objetivo::createObjetivoCliente($objetivo1, $objetivo2, $objetivo3, $objetivo4, $objetivo5, $objetivoOutro);
    }

    public function createAvaliacao(string $profissao, string $altura, int $horasTrabalho, int $horasSono, int $sedentarismo, int $motivacao, int $treino, string $parq1, string $parq2, string $parq3, string $parq4, string $parq5, string $parq6, ?string $razaoAtividade, ?string $questaoCirurgia, string $questaoGravida, ?string $questaoMedicacao, string $anamneseDesportiva1, string $anamneseDesportiva2, string $questaoTrabalho, ?string $outroTrabalho, ?string $observacoes, $anamneseClinica, $objetivo, $idCliente, $dataNascimento)
    {
        $cliente = User::find($idCliente);
        $avaliacao = AvaliacaoInicial::createAvaliacaoCliente($horasTrabalho, $horasSono, $sedentarismo, $motivacao, $treino, $parq1, $parq2, $parq3, $parq4, $parq5, $parq6, $razaoAtividade, $questaoCirurgia, $questaoGravida, $questaoMedicacao, $anamneseDesportiva1, $anamneseDesportiva2, $questaoTrabalho, $outroTrabalho, $observacoes,  $anamneseClinica, $objetivo);
        $tarefa = Tarefa::where('user_id', $cliente->id)->first();
        $tarefa->tarefaMade("avaliacao_inicial");
        $cliente->associarAvaliacao($avaliacao, $dataNascimento, $altura, $profissao);
    }

    public function criarCondicaoUser(?int $cintura, ?int $peso, ?int $coxa, ?int $quadril, ?int $abs, ?int $braco, ?int $peito, int $idCliente)
    {
        $cliente = User::find($idCliente);
        Condicao::createCondicaoCliente($cintura, $peso, $coxa, $quadril, $abs, $braco, $peito, $cliente);
    }

    public function criarFotosProgresso(string $pathFotoFrente, string $pathFotoLado, string $pathFotoCostas, int $idCliente, string $titulo)
    {
        $cliente = User::find($idCliente);
        FotosProgresso::createFotosCliente($pathFotoFrente, $pathFotoLado, $pathFotoCostas, $cliente, $titulo);
    }

    public function getAvaliacoes()
    {
        return AvaliacaoInicial::all();
    }

    public function getAvaliacao($idAvaliacao)
    {
        return AvaliacaoInicial::find($idAvaliacao);
    }

    public function getFeedback(int $id)
    {
        return Feedback::find($id);
    }
}

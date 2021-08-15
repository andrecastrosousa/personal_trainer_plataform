<?php


namespace App\Models;


class UserHandler
{

    public function addCliente(string $nome, string $email, string $password, int $tipoServico, $telemovel)
    {
        $user = User::addCliente($nome, $email, $password, $tipoServico, $telemovel);
        Tarefa::createTarefa($user);
        return $user;
    }

    public function getClientes()
    {
        return (new User)->getClientes();
    }

    public function apagarCliente(int $id)
    {
        User::apagarCliente($id);
    }

    public function getCliente(int $id)
    {
        return User::getCliente($id);
    }

    public function alterarCliente(int $id, string $nome, string $email, int $tipoServico, $telemovel, int $pagamento)
    {
        $user = User::findOrFail($id);
        $user->alterarCliente($nome, $email, $tipoServico, $telemovel, $pagamento);
    }

    public function alterarPassword(int $id, string $password)
    {
        $user = User::findOrFail($id);
        $user->alterarPassword($password);
    }

    public function getClienteAvaliacao($idAvaliacao)
    {
        return User::where('avaliacao_inicial_id', $idAvaliacao)->first();
    }

    public function getFotosCliente($idCliente)
    {
        return FotosProgresso::where('user_id', $idCliente)->get();
    }

    public function getFotoCliente($idFoto)
    {
        return FotosProgresso::find($idFoto);
    }

    public function atualizarFotosProgresso(string $pathFotoFrente, string $pathFotoLado, string $pathFotoCostas, $titulo, $idFotos)
    {
        $fotosProgresso = FotosProgresso::find($idFotos);
        $fotosProgresso->atualizarFotosProgresso($pathFotoFrente, $pathFotoLado, $pathFotoCostas, $titulo);
    }

    public function getProgressoCliente($idCliente)
    {
        return Condicao::where('user_id', $idCliente)->get();
    }

    public function getCondicao($idCondicao)
    {
        return Condicao::find($idCondicao);
    }

    public function updateCondicao($peso, $cintura, $coxa, $quadril, $abdominal, $braco, $peito, $idCondicao)
    {
        $condicao = Condicao::find($idCondicao);
        $condicao->updateCondicao($peso, $cintura, $coxa, $quadril, $abdominal, $braco, $peito);
    }

    public function criarOpiniao(?bool $opiniao1, ?bool $opiniao2, ?bool $opiniao3, ?bool $opiniao4, ?bool $opiniao5, ?bool $opiniao6, ?bool $opiniao7, ?bool $opiniao8, ?bool $opiniao9, ?bool $outraOpiniao)
    {
        return Opiniao::createOpiniao($opiniao1, $opiniao2, $opiniao3, $opiniao4, $opiniao5, $opiniao6, $opiniao7, $opiniao8, $opiniao9, $outraOpiniao);
    }

    public function criarFeedback(int $cansaco, int $fome, int $sono, int $humor, int $motivacao, int $stress, int $satisfacao, Opiniao $opiniao, int $recomendacao, int $satisfacaoTreino, ?string $feedback, int $idCliente)
    {
        $cliente = User::find($idCliente);
        Feedback::createFeedback($cansaco, $fome, $sono, $humor, $motivacao, $stress, $satisfacao, $opiniao, $recomendacao, $satisfacaoTreino, $feedback, $cliente);
    }

    public function updateCliente($id, ?string $nome, ?int $telemovel, $dataNascimento, ?string $profissao)
    {
        $user = User::findOrFail($id);
        $user->updateCliente($nome, $telemovel, $dataNascimento, $profissao);
    }

    public function getTarefas()
    {
        return Tarefa::all();
    }

    public function tarefaMade(int $idTarefa, ?string $nomeTarefa)
    {
        $tarefa = Tarefa::find($idTarefa);
        printf($tarefa);
        $tarefa->tarefaMade($nomeTarefa);
    }
}

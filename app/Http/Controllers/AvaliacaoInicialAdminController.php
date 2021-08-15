<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoHandler;
use App\Models\User;
use App\Models\UserHandler;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AvaliacaoInicialAdminController extends Controller
{
    const ID_CLIENTE = "cliente";
    const DATA_NASC = "data_nascimento";
    const PROFISSAO = "profissao";
    const TELEMOVEL = "telemovel";
    const ALTURA = "altura";
    const PESO = "peso";
    const CINTURA_PERIMETRO = "cintura_perimetro";
    const COXA_PERIMETRO = "coxa_perimetro";
    const QUADRIL_PERIMETRO = "quadril_perimetro";
    const ABS_PERIMETRO = "abs_perimetro";
    const BRACO_PERIMETRO = "braco_perimetro";
    const PEITO_PERIMETRO = "peito_perimetro";
    const HORAS_TRABALHO = "horas_trabalho";
    const HORAS_SONO = "horas_sono";
    const SEDENTARISMO = "sedentarismo";
    const OBJETIVO = "objetivo";
    const MOTIVACAO = "motivacao";
    const TREINO = "treino";
    const CLINICA = "clinica";
    const PAR_Q1 = "parq1";
    const PAR_Q2 = "parq2";
    const PAR_Q3 = "parq3";
    const PAR_Q4 = "parq4";
    const PAR_Q5 = "parq5";
    const PAR_Q6 = "parq6";
    const RAZAO_ATIVIDADE = "razao_atividade";
    const QUESTAO_CIRURGIA = "questao_cirurgia";
    const QUESTAO_GRAVIDA = "questao_gravida";
    const QUESTAO_MEDICACAO = "questao_medicacao";
    const ANA_DESPORTIVA1 = "ana_desportiva1";
    const ANA_DESPORTIVA2 = "ana_desportiva2";
    const QUESTAO_TRABALHO = "questao_trabalho";
    const OBSERVACOES = "observacoes";
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(AvaliacaoHandler $avaliacaoHandler)
    {
        if(Auth::user()->admin == 1) {
            return view('admin.avaliacao.listar_avaliacao_inicial',
                [
                    "avaliacoes" => $avaliacaoHandler->getAvaliacoes(),
                ]);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create(UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {

            return view('admin.avaliacao.avaliacao_inicial',
                [
                    "users" => $userHandler->getClientes(),
                ]
            );
        } else
            abort(404, 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param AvaliacaoHandler $avaliacaoHandler
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, AvaliacaoHandler $avaliacaoHandler)
    {
        if(Auth::user()->admin == 1) {
            $validator = $this->validate(request(),
                [
                    self::ID_CLIENTE => 'required',
                    self::DATA_NASC => 'required',
                    self::PROFISSAO => 'required|string',
                    self::TELEMOVEL => 'nullable|integer|min:9|max:9',
                    self::ALTURA => 'required|string',
                    self::PESO => 'required|integer',
                    self::CINTURA_PERIMETRO => 'nullable|integer',
                    self::COXA_PERIMETRO => 'nullable|integer',
                    self::QUADRIL_PERIMETRO => 'nullable|integer',
                    self::ABS_PERIMETRO => 'nullable|integer',
                    self::BRACO_PERIMETRO => 'nullable|integer',
                    self::PEITO_PERIMETRO => 'nullable|integer',
                    self::HORAS_TRABALHO => 'required|integer',
                    self::HORAS_SONO => 'required|integer',
                    self::SEDENTARISMO => 'required',
                    self::MOTIVACAO => 'required',
                    self::PAR_Q1 => 'required',
                    self::PAR_Q2 => 'required',
                    self::PAR_Q3 => 'required',
                    self::PAR_Q4 => 'required',
                    self::PAR_Q5 => 'required',
                    self::PAR_Q6 => 'required',
                    self::RAZAO_ATIVIDADE => 'required|string',
                    self::QUESTAO_CIRURGIA => 'nullable|string',
                    self::QUESTAO_GRAVIDA => 'required',
                    self::QUESTAO_MEDICACAO => 'required',
                    self::ANA_DESPORTIVA1 => 'required',
                    self::ANA_DESPORTIVA2 => 'required',
                    self::QUESTAO_TRABALHO => 'required',
                    self::OBSERVACOES => 'nullable|string'

                ]);

            try {
                $pathFotoFrente = '';
                $pathFotoLado = '';
                $pathFotoCostas = '';

                if ($request->has('fotoFrente')) {
                    $path = $request->file('fotoFrente')->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathFotoFrente = $path;
                }

                if ($request->has('fotoLado')) {
                    $path = $request->file('fotoLado')->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathFotoLado = $path;
                }

                if ($request->has('fotoCostas')) {
                    $path = $request->file('fotoCostas')->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathFotoCostas = $path;
                }

                $anamneseClinica = $avaliacaoHandler->createAnamneseAvaliacao(
                    request("clinica1"),
                    request("clinica2"),
                    request("clinica3"),
                    request("clinica4"),
                    request("clinica5"),
                    request("clinica6"),
                    request("clinica7"),
                    request("clinica8"),
                    request("clinica9"),
                    request("clinica10"),
                    request("clinica11"),
                    request("clinica12"),
                    request("clinica13"),
                    request("clinica14"),
                    request("clinicaOutro")
                );

                $objetivo = $avaliacaoHandler->criarObjetivoAvaliacao(
                    request("objetivo1"),
                    request("objetivo2"),
                    request("objetivo3"),
                    request("objetivo4"),
                    request("objetivo5"),
                    request("objetivoOutro")
                );

                $avaliacaoHandler->createAvaliacao(
                    request(self::PROFISSAO),
                    request(self::ALTURA),
                    request(self::HORAS_TRABALHO),
                    request(self::HORAS_SONO),
                    request(self::SEDENTARISMO),
                    request(self::MOTIVACAO),
                    request(self::TREINO),
                    request(self::PAR_Q1),
                    request(self::PAR_Q2),
                    request(self::PAR_Q3),
                    request(self::PAR_Q4),
                    request(self::PAR_Q5),
                    request(self::PAR_Q6),
                    request(self::RAZAO_ATIVIDADE),
                    request(self::QUESTAO_CIRURGIA),
                    request(self::QUESTAO_GRAVIDA),
                    request(self::QUESTAO_MEDICACAO),
                    request(self::ANA_DESPORTIVA1),
                    request(self::ANA_DESPORTIVA2),
                    request(self::QUESTAO_TRABALHO),
                    request("outro_trabalho"),
                    request(self::OBSERVACOES),
                    $anamneseClinica,
                    $objetivo,
                    request("cliente"),
                    request(self::DATA_NASC)
                );

                $avaliacaoHandler->criarFotosProgresso($pathFotoFrente, $pathFotoLado, $pathFotoCostas, request("cliente"), "Início");

                $avaliacaoHandler->criarCondicaoUser(
                    request(self::CINTURA_PERIMETRO),
                    request(self::PESO),
                    request(self::COXA_PERIMETRO),
                    request(self::QUADRIL_PERIMETRO),
                    request(self::ABS_PERIMETRO),
                    request(self::BRACO_PERIMETRO),
                    request(self::PEITO_PERIMETRO),
                    request("cliente")
                );
                return redirect("dnpt/admin/cliente_avaliacao_inicial")->withErrors(["avaliacaoConcluida" => "Avaliação feita com sucesso"]);
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/cliente_avaliacao_inicial/create")
                    ->withErrors($validator)
                    ->withInput();

            }
        } else
            abort(404, 'Page not found');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($idAvaliacao, AvaliacaoHandler $avaliacaoHandler, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.avaliacao.detalhes_avaliacao_inicial",
                [
                    "avaliacao" => $avaliacaoHandler->getAvaliacao($idAvaliacao),
                    "user" => $userHandler->getClienteAvaliacao($idAvaliacao)
                ]
            );
        } else
            abort(404, 'Page not found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

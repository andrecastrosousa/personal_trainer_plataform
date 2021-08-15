<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\DiaExercicio;
use App\Models\ExercicioHandler;
use App\Models\PlanoTreinoHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DiaController extends Controller
{
    const DIA = "dia";

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $idCliente
     * @param int $idPlano
     * @param ExercicioHandler $exercicioHandler
     * @return Application|Factory|View|Response
     */
    public function create(int $idCliente, int $idPlano, ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1) {

            return view("admin.planos.criar_dia_plano",
                [
                    "exercicios" => $exercicioHandler->getExerciciosFiltros(),
                    "cliente" => $idCliente,
                    "plano" => $idPlano,
                    "dia" => request(self::DIA),
                    "tipoExercicios" => $exercicioHandler->getTipoExercicios(),
                ]
            );
        } else
            abort(404, 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $idCliente
     * @param $idPlano
     * @param PlanoTreinoHandler $planoTreinoHandler
     * @return Response
     */
    public function store(Request $request, $idCliente, $idPlano,PlanoTreinoHandler $planoTreinoHandler): Response
    {
        if(Auth::user()->admin == 1) {
            $planoTreinoHandler->criarDiaPlano($idCliente, $idPlano);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Display the specified resource.
     *
     * @param Dia $dia
     * @return Response
     */
    public function show(Dia $dia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dia $dia
     * @return Application|Factory|View|Response
     */
    public function edit(int $cliente, int $plano, int $dia, PlanoTreinoHandler $planoTreinoHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.planos.editar_dia_plano_treino",
                [
                    "dia" => $planoTreinoHandler->getDiaPlanoCliente($dia),
                    "plano" => $planoTreinoHandler->getPlanoCliente($cliente),
                ]
            );
        } else
            abort(404, 'Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Dia $dia
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Dia $dia, PlanoTreinoHandler $planoTreinoHandler)
    {
        if(Auth::user()->admin == 1) {
            $exerciciosDia = [];
            foreach (DiaExercicio::where('dia_id', request("dia"))->get() as $diaExercicio) {
                $arr = [$diaExercicio->id, $request["reps" . $diaExercicio->id], $request["serie" . $diaExercicio->id], $request["tempoDesc" . $diaExercicio->id], $request["carga" . $diaExercicio->id], $request["observacoes" . $diaExercicio->id]];
                array_push($exerciciosDia, $arr);
            }

            $cliente = request("cliente");
            $plano = request("plano");

            $planoTreinoHandler->updateDiaPlano($exerciciosDia);
            return redirect("dnpt/admin/clientes/{$cliente}/plano_treino/{$plano}")
                ->withErrors(["AlteracaoSucesso", "Alteração feita com sucesso!"]);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dia $dia
     * @return Response
     */
    public function destroy(Dia $dia)
    {
        //
    }
}

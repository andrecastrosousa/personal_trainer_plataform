<?php

namespace App\Http\Controllers;

use App\Models\ExercicioHandler;
use App\Models\PlanoTreino;
use App\Models\PlanoTreinoHandler;
use App\Models\User;
use App\Models\UserHandler;
use Barryvdh\DomPDF\Facade as PDF;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PlanoTreinoController extends Controller
{
    const ID_CLIENTE = "cliente";
    const ID_PLANO = "plano";
    const OBJETIVO = "objetivo";

    /**
     * Display a listing of the resource.
     *
     * @param $idCliente
     * @return Response
     */
    public function index($idCliente)
    {
        if(Auth::user()->admin == 1) {
            // retreive all records from db
            $data = ["Hello World"];

            $cliente = (new UserHandler)->getCliente($idCliente);
            $plano = (new PlanoTreinoHandler)->getPlanoCliente($idCliente);
            // share data to view
            view()->share('cliente', $cliente);
            view()->share('plano', $plano);
            $pdf = PDF::loadView('admin.planos.pdf_view', [$cliente, $plano]);

            // download PDF file with download method
            return $pdf->download('PLANO-DE-TREINO-' . $cliente->nome . '.pdf');
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $idCliente
     * @return Application|Factory|View|Response
     */
    public function create(int $idCliente, ExercicioHandler $exercicioHandler, UserHandler $userHandler, PlanoTreinoHandler $planoTreinoHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.planos.criar_plano_treino",
                [
                    "plano" => $planoTreinoHandler->getPlanoCliente($idCliente),
                    "exercicios" => $exercicioHandler->getExerciciosFiltros(),
                    "cliente" => $idCliente,
                    "tipoExercicios" => $exercicioHandler->getTipoExercicios(),
                ]);
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request,  ExercicioHandler $exercicioHandler, PlanoTreinoHandler $planoTreinoHandler)
    {
        if(Auth::user()->admin == 1) {
            if ($request->dia1) {
                $exerciciosDia1 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia1num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia1num" . $exercicio->id . "reps"], $request["dia1num" . $exercicio->id . "serie"], $request["dia1num" . $exercicio->id . "tempoDesc"], $request["dia1num" . $exercicio->id . "carga"], $request["dia1num" . $exercicio->id . "tecnica"], $request["dia1num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia1, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia1, 1, request("dia1Titulo"));
            }
            if ($request->dia2) {
                $exerciciosDia2 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia2num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia2num" . $exercicio->id . "reps"], $request["dia2num" . $exercicio->id . "serie"], $request["dia2num" . $exercicio->id . "tempoDesc"], $request["dia2num" . $exercicio->id . "carga"], $request["dia2num" . $exercicio->id . "tecnica"], $request["dia2num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia2, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia2, 2, request("dia2Titulo"));
            }
            if ($request->dia3) {
                $exerciciosDia3 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia3num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia3num" . $exercicio->id . "reps"], $request["dia3num" . $exercicio->id . "serie"], $request["dia3num" . $exercicio->id . "tempoDesc"], $request["dia3num" . $exercicio->id . "carga"], $request["dia3num" . $exercicio->id . "tecnica"], $request["dia3num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia3, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia3, 3, request("dia3Titulo"));
            }
            if ($request->dia4) {
                $exerciciosDia4 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia4num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia4num" . $exercicio->id . "reps"], $request["dia4num" . $exercicio->id . "serie"], $request["dia4num" . $exercicio->id . "tempoDesc"], $request["dia4num" . $exercicio->id . "carga"], $request["dia4num" . $exercicio->id . "tecnica"], $request["dia4num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia4, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia4, 4, request("dia4Titulo"));
            }
            if ($request->dia5) {
                $exerciciosDia5 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia5num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia5num" . $exercicio->id . "reps"], $request["dia5num" . $exercicio->id . "serie"], $request["dia5num" . $exercicio->id . "tempoDesc"], $request["dia5num" . $exercicio->id . "carga"], $request["dia5num" . $exercicio->id . "tecnica"], $request["dia5num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia5, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia5, 5, request("dia5Titulo"));

            }
            if ($request->dia6) {
                $exerciciosDia6 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia6num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia6num" . $exercicio->id . "reps"], $request["dia6num" . $exercicio->id . "serie"], $request["dia6num" . $exercicio->id . "tempoDesc"], $request["dia6num" . $exercicio->id . "carga"], $request["dia6num" . $exercicio->id . "tecnica"], $request["dia6num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia6, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia6, 6, request("dia6Titulo"));

            }
            if ($request->dia7) {
                $exerciciosDia7 = [];
                foreach ($exercicioHandler->getExercicios() as $exercicio) {
                    if ($request["dia7num" . $exercicio->id] != null) {
                        $arr = [$exercicio->id, $request["dia7num" . $exercicio->id . "reps"], $request["dia7num" . $exercicio->id . "serie"], $request["dia7num" . $exercicio->id . "tempoDesc"], $request["dia7num" . $exercicio->id . "carga"], $request["dia7num" . $exercicio->id . "tecnica"], $request["dia7num" . $exercicio->id . "obs"]];
                        array_push($exerciciosDia7, $arr);
                    }
                }
                $planoTreinoHandler->criarPlanoDiasExercicios(request(self::ID_CLIENTE), request(self::ID_PLANO), $exerciciosDia7, 7, request("dia7Titulo"));
            }
            $idCliente = request(self::ID_CLIENTE);
            $idPlano = request(self::ID_PLANO);
            return redirect("dnpt/admin/clientes/{$idCliente}/plano_treino/{$idPlano}");
        } else {
            abort(404, 'Page not found');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param PlanoTreino $planoTreino
     * @return Application|Factory|View|Response
     */
    public function show(int $idCliente, int $idPlano, PlanoTreinoHandler $planoTreinoHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.planos.plano_treino",
                [
                    "plano" => $planoTreinoHandler->getPlanoClienteSelecionado($idPlano),
                    "cliente" => $idCliente
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PlanoTreino $planoTreino
     * @return Response
     */
    public function edit(PlanoTreino $planoTreino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PlanoTreino $planoTreino
     * @return Response
     */
    public function update(Request $request, PlanoTreino $planoTreino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PlanoTreino $planoTreino
     * @return Response
     */
    public function destroy(PlanoTreino $planoTreino)
    {
        //
    }

    public function listarPlanos() {
        if(Auth::user()->admin == 1) {
            return view("admin.planos.listar_planos_treino",
                [
                    "planos" => (new PlanoTreinoHandler)->getPlanosTreino(),
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    public function criarPlano()
    {
        if(Auth::user()->admin == 1) {
            return view("admin.planos.escolher_cliente_plano",
                [
                    "users" => (new UserHandler)->getClientes(),
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    public function comecarPlano()
    {
        if(Auth::user()->admin == 1) {

            $validator = $this->validate(request(),
                [
                    self::OBJETIVO => 'required',
                    self::ID_CLIENTE => 'required',

                ]
            );
            try {
                $id = request(self::ID_CLIENTE);
                printf($id);
                (new PlanoTreinoHandler)->criarPlano($id, request(self::OBJETIVO));

                return redirect("dnpt/admin/clientes/{$id}/plano_treino/create");
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/planos_treino/criar")->withErrors($validator);
            }
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * @param $idCliente
     * @param $idPlano
     * @return Application|ResponseFactory|Response
     */
    public function criarPDF($idCliente, $idPlano) {
        if(Auth::user()->admin == 1) {
            return response("ola");
        } else {
            abort(404, 'Page not found');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ExercicioHandler;
use App\Models\TipoExercicio;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TipoExercicioController extends Controller
{
    const NOME = "nome";

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
     * @return Application|Factory|View|Response|void
     */
    public function create()
    {
        if(Auth::user()->admin == 1)
            return view('admin.exercicios.criar_tipo_exercicio');
        else
            abort(404, 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->admin == 1) {
            $this->validate(request(),
                [
                    self::NOME => 'required|string|max:255'
                ]
            );

            $t = new TipoExercicio();
            $t->nome = request(self::NOME);
            $t->save();

            return redirect()->route("exercicios.dashboard");
        }else
            abort(404, 'Page not found');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param ExercicioHandler $exercicioHandler
     * @return Application|Factory|View|Response
     */
    public function show(int $id, ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.exercicios.detalhes_tipo_exercicio", [
                    "exercicios" => $exercicioHandler->getExerciciosByTipo($id),
                    "tipoExercicio" => $exercicioHandler->getTipoExercicio($id)
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TipoExercicio $tipoExercicio
     * @return Response
     */
    public function edit(TipoExercicio $tipoExercicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TipoExercicio $tipoExercicio
     * @return Response
     */
    public function update(Request $request, TipoExercicio $tipoExercicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TipoExercicio $tipoExercicio
     * @return Response
     */
    public function destroy(TipoExercicio $tipoExercicio)
    {


    }
}

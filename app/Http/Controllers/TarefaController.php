<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\UserHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    const TAREFA = "tarefa";

    /**
     * Display a listing of the resource.
     *
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response
     */
    public function index(UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.tarefa.listar_tarefas",
                [
                    "tarefas" => $userHandler->getTarefas()
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Tarefa $tarefa
     * @return Response
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tarefa $tarefa
     * @return Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $idTarefa
     * @param UserHandler $userHandler
     * @return RedirectResponse
     */
    public function update(Request $request, int $idTarefa, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            $userHandler->tarefaMade($idTarefa, request(self::TAREFA));
            return redirect()->route("tarefas.index");
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tarefa $tarefa
     * @return Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}

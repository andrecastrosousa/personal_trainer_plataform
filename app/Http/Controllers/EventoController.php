<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if(Auth::user()->admin == 1) {

            $tasks = Event::all();
            return view('admin.calendario.mostrar_calendario', compact('tasks'));
        } else
            abort(404, 'Page not found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        if(Auth::user()->admin == 1) {
            return view('admin.calendario.criar_evento_calendario', ["tasks" => Event::all()]);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if(Auth::user()->admin == 1) {

            Event::create($request->all());
            return redirect()->route('marcacoes.index');
        } else
            abort(404, 'Page not found');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.calendario.detalhes_evento", ["evento" => Event::findOrFail($id)]);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        if(Auth::user()->admin == 1) {

            return view("admin.calendario.editar_evento_calendario", ["evento" => Event::findOrFail($id)]);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->admin == 1) {

            $e = Event::findOrFail($id);
            $e->alterarEvento(request("name"), request("description"), request("hora_inicio"), request("hora_fim"), request("task_date"));

            return redirect()->route('marcacoes.show', $id);
        } else
            abort(404, 'Page not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|Response
     */
    public function destroy($id)
    {
        if(Auth::user()->admin == 1) {

            $e = Event::findOrFail($id);
            $e->delete();
            return redirect()->route('marcacoes.index')->withErrors(["eventoApagado" => "Evento Apagado com sucesso."]);
        } else
            abort(404, 'Page not found');
    }
}

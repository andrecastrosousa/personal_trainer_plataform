<?php

namespace App\Http\Controllers;

use App\Models\ExercicioHandler;
use App\Models\UserHandler;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExercicioController extends Controller
{
    const NOME = "nome";
    const MUSCULOS = "musculos";
    const TIPO_EXERCICIO = "tipo_exercicio";
    const TIPO_EXERCICIO2 = "tipo_exercicio2";
    const FOTO_VIDEO_EXERCICIO = "fotoVideoExercicio";

    public function dashboardExercicios()
    {
        if(Auth::user()->admin == 1) {

            $exercicioHandler = new ExercicioHandler();
            return view("admin.exercicios.dashboard_exercicios",
                [
                    "tipoExercicios" => $exercicioHandler->getTipoExercicios(),
                    "exercicios" => $exercicioHandler->getExercicios()
                ]);
        } else
            abort(404, 'Page not found');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if(Auth::user()->admin == 1)
            return view('admin.exercicios.listar_exercicios');
        else
            abort(404, 'Page not found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response|void
     */
    public function create(ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1)
            return view('admin.exercicios.criar_exercicio',
                [
                    "tipoExercicios" => $exercicioHandler->getTipoExercicios()
                ]
            );
        else
            abort(404, 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1) {

            $validator = $this->validate(request(),
                [
                    self::NOME => 'required|string',
                    self::MUSCULOS => 'nullable|string',
                    self::TIPO_EXERCICIO => 'required',
                    self::TIPO_EXERCICIO2 => 'nullable'
                ]
            );
            try {
                if ($request->has('fotoVideoExercicio')) {
                    $path = $request->file('fotoVideoExercicio')->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathFotoVideo = $path;
                }

                $exercicioHandler->addExercicio(
                    request(self::NOME),
                    request(self::MUSCULOS),
                    request(self::TIPO_EXERCICIO),
                    request(self::TIPO_EXERCICIO2),
                    $pathFotoVideo
                );

                return redirect("dnpt/admin/exercicios/dashboard")
                    ->withErrors(["exercicioCriado" => "Exercício criado com sucesso!"]);
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/exercicios/create")
                    ->withInput()
                    ->withErrors($validator);
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
    public function show($id, ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1)
            return view('admin.exercicios.detalhes_exercicio',
                [
                    "exercicio" => $exercicioHandler->getExercicio($id),
                    "video" => $exercicioHandler->getTipoFicheiro($id),
                    "tipoExercicios" => $exercicioHandler->getTipoExercicios()
                ]
            );
        else
            abort(404, 'Page not found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id, ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1)
            return view('admin.exercicios.editar_exercicio',
                [
                    "exercicio" => $exercicioHandler->getExercicio($id),
                    "video" => $exercicioHandler->getTipoFicheiro($id),
                    "tipoExercicios" => $exercicioHandler->getTipoExercicios()
                ]
            );
        else
            abort(404, 'Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id, ExercicioHandler $exercicioHandler)
    {
        if(Auth::user()->admin == 1) {

            $validator = $this->validate(request(),
                [
                    self::NOME => 'required|string',
                    self::MUSCULOS => 'nullable|string',
                    self::TIPO_EXERCICIO => 'required',
                    self::TIPO_EXERCICIO2 => 'nullable'
                ]
            );
            try {
                $pathFotoVideo = '';
                if ($request->has('fotoVideoExercicio')) {
                    $path = $request->file('fotoVideoExercicio')->store('public');
                    $path = substr($path, 6);
                    $path = "storage" . $path;
                    $pathFotoVideo = $path;
                }

                $exercicioHandler->updateExercicio(
                    $id,
                    request(self::NOME),
                    request(self::MUSCULOS),
                    request(self::TIPO_EXERCICIO),
                    request(self::TIPO_EXERCICIO2),
                    $pathFotoVideo
                );

                return redirect("dnpt/admin/exercicios/{$id}")
                    ->withErrors(["exercicioCriado" => "Exercício criado com sucesso!"]);
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/exercicios/{$id}/edit")
                    ->withInput()
                    ->withErrors($validator);
            }
        } else
            abort(404, 'Page not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ExercicioHandler $exercicioHandler
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id, ExercicioHandler $exercicioHandler)
    {
        $exercicioHandler->deleteExercicio($id);
        return redirect("/dnpt/admin/exercicios/dashboard");

    }
}

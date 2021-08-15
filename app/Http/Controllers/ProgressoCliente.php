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

class ProgressoCliente extends Controller
{
    const PESO = "peso";
    const CINTURA_PERIMETRO = "cintura_perimetro";
    const COXA_PERIMETRO = "coxa_perimetro";
    const QUADRIL_PERIMETRO = "quadril_perimetro";
    const ABS_PERIMETRO = "abs_perimetro";
    const BRACO_PERIMETRO = "braco_perimetro";
    const PEITO_PERIMETRO = "peito_perimetro";

    /**
     * Display a listing of the resource.
     *
     * @param $idCliente
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response
     */
    public function index($idCliente, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view('admin.cliente.progresso_cliente',
                [
                    "cliente" => $userHandler->getCliente($idCliente),
                    "progressos" => $userHandler->getProgressoCliente($idCliente),
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $idCliente
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response
     */
    public function create($idCliente, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view('admin.cliente.criar_progresso_cliente',
                [
                    "cliente" => $userHandler->getCliente($idCliente),
                ]
            );
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $idCliente
     * @param AvaliacaoHandler $avaliacaoHandler
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $idCliente, AvaliacaoHandler $avaliacaoHandler)
    {
        if(Auth::user()->admin == 1) {
            $validator = $this->validate(request(),
                [
                    self::PESO => 'required|integer',
                    self::CINTURA_PERIMETRO => 'required|integer',
                    self::COXA_PERIMETRO => 'required|integer',
                    self::QUADRIL_PERIMETRO => 'required|integer',
                    self::ABS_PERIMETRO => 'required|integer',
                    self::BRACO_PERIMETRO => 'required|integer',
                    self::PEITO_PERIMETRO => 'required|integer',
                ]
            );
            try {
                $avaliacaoHandler->criarCondicaoUser(
                    request(self::CINTURA_PERIMETRO),
                    request(self::PESO),
                    request(self::COXA_PERIMETRO),
                    request(self::QUADRIL_PERIMETRO),
                    request(self::ABS_PERIMETRO),
                    request(self::BRACO_PERIMETRO),
                    request(self::PEITO_PERIMETRO),
                    $idCliente
                );
                return redirect("dnpt/admin/cliente/{$idCliente}/progresso");
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/cliente/{$idCliente}/progresso/create")
                    ->withErrors($validator)
                    ->withInput();
            }
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $idCliente
     * @param $idCondicao
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response
     */
    public function edit($idCliente, $idCondicao, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view('admin.cliente.editar_progresso_cliente',
                [
                    "cliente" => $userHandler->getCliente($idCliente),
                    "progresso" => $userHandler->getCondicao($idCondicao),
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $idCliente
     * @param $idCondicao
     * @param UserHandler $userHandler
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $idCliente, $idCondicao, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            $validator = $this->validate(request(),
                [
                    self::PESO => 'required|integer',
                    self::CINTURA_PERIMETRO => 'required|integer',
                    self::COXA_PERIMETRO => 'required|integer',
                    self::QUADRIL_PERIMETRO => 'required|integer',
                    self::ABS_PERIMETRO => 'required|integer',
                    self::BRACO_PERIMETRO => 'required|integer',
                    self::PEITO_PERIMETRO => 'required|integer',
                ]
            );
            try {
                $userHandler->updateCondicao(
                    request(self::CINTURA_PERIMETRO),
                    request(self::PESO),
                    request(self::COXA_PERIMETRO),
                    request(self::QUADRIL_PERIMETRO),
                    request(self::ABS_PERIMETRO),
                    request(self::BRACO_PERIMETRO),
                    request(self::PEITO_PERIMETRO),
                    $idCondicao
                );
                return redirect("dnpt/admin/cliente/{$idCliente}/progresso/");
            } catch (ValidationException $e) {
                return  redirect("dnpt/admin/cliente/{$idCliente}/progresso/{$idCondicao}/edit")
                    ->withErrors($validator)
                    ->withInput();
            }
        } else {
            abort(404, 'Page not found');
        }
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

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

class CarregarFotos extends Controller
{
    const TITULO = "titulo";
    const FOTO_FRENTE = "fotoFrente";
    const FOTO_LADO = "fotoLado";
    const FOTO_COSTAS = "fotoCostas";

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

            return view('admin.cliente.fotos_cliente',
                [
                    "fotos" => $userHandler->getFotosCliente($idCliente),
                    "user" => $userHandler->getCliente($idCliente)
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create($idCliente, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {

            return view("admin.cliente.criar_fotos_cliente",
                [
                    "user" => $userHandler->getCliente($idCliente)
                ]
            );
        } else
            abort(404, 'Page not found');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $idCliente, AvaliacaoHandler $avaliacaoHandler)
    {
        if(Auth::user()->admin == 1) {

            $validator = $this->validate(request(),
                [
                    self::TITULO => "required",
                    self::FOTO_COSTAS => "required",
                    self::FOTO_FRENTE => "required",
                    self::FOTO_LADO => "required"
                ]
            );

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

                $avaliacaoHandler->criarFotosProgresso($pathFotoFrente, $pathFotoLado, $pathFotoCostas, $idCliente, request(self::TITULO));

                return redirect("dnpt/admin/cliente/{$idCliente}/fotos");
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/cliente/{$idCliente}/fotos/create")
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
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($idCliente, $idFotos, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view('admin.cliente.editar_fotos_cliente',
                [
                    "foto" => $userHandler->getFotoCliente($idFotos),
                    "user" => $userHandler->getCliente($idCliente)
                ]
            );
        } else
            abort(404, 'Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $idCliente, $idFoto, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {

            $validator = $this->validate(request(),
                [
                    self::TITULO => "required"
                ]
            );

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

                $userHandler->atualizarFotosProgresso($pathFotoFrente, $pathFotoLado, $pathFotoCostas, request(self::TITULO), $idFoto);

                return redirect("dnpt/admin/cliente/{$idCliente}/fotos");
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/cliente/{$idCliente}/fotos/{$idFoto}/edit")
                    ->withErrors($validator)
                    ->withInput();
            }
        } else
            abort(404, 'Page not found');
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserHandler;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    const NOME = 'nome';
    const EMAIL = 'email';
    const TELEMOVEL = 'telemovel';
    const SERVICO = 'servico';
    const PASSWORD = 'password';
    const PAGAMENTO = 'pagamento';

    /**
     * Display a listing of the resource.
     *
     * @param UserHandler $userHandler
     * @return Application|Factory|View|void
     */
    public function index(UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view('admin.cliente.listar_clientes',
                [
                    "users" => $userHandler->getClientes()
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response|void
     */
    public function create()
    {
        if(Auth::user()->admin == 1)
            return view('admin.cliente.criar_cliente');
        else
            abort(404, 'Page not found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            $validator = $this->validate(request(),
                [
                    self::NOME => 'required|string|max:255',
                    self::EMAIL => 'required|string|email|max:255|unique:users',
                    self::PASSWORD => 'required|string|confirmed|min:8',
                    self::TELEMOVEL => 'nullable|integer|min:9',
                    self::SERVICO => 'required'
                ]
            );

            try {
                $userHandler->addCliente(
                    request(self::NOME),
                    request(self::EMAIL),
                    request(self::PASSWORD),
                    request(self::SERVICO),
                    request(self::TELEMOVEL)
                );
                return redirect('dnpt/admin/clientes')->withErrors(['clienteCriado' => 'Cliente criado com sucesso!']);
            } catch (ValidationException $e) {
                return redirect('dnpt/admin/clientes/create')
                    ->withInput()
                    ->withErrors($validator);
            }
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response|void
     */
    public function show(int $id, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.cliente.detalhes_cliente",
                [
                    "cliente" => $userHandler->getCliente($id)
                ]
            );
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param UserHandler $userHandler
     * @return Application|Factory|View|Response|void
     */
    public function edit(int $id, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.cliente.editar_cliente",
                [
                    "cliente" => $userHandler->getCliente($id)
                ]
            );
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param UserHandler $userHandler
     * @return Application|RedirectResponse|Response|Redirector|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            $validator = $this->validate(request(),
                [
                    self::NOME => 'required|string|max:255',
                    self::TELEMOVEL => 'nullable|integer',
                    self::SERVICO => 'required',
                    self::PAGAMENTO => 'required'
                ]
            );
            if (request(self::EMAIL) != $userHandler->getCliente($id)->email)
                $validator = $this->validate(request(),
                    [
                        self::EMAIL => 'required|string|email|max:255|unique:users',
                    ]
                );
            try {
                $userHandler->alterarCliente(
                    $id,
                    request(self::NOME),
                    request(self::EMAIL),
                    request(self::SERVICO),
                    request(self::TELEMOVEL),
                    request(self::PAGAMENTO)
                );
                return redirect('dnpt/admin/clientes')->withErrors(['clienteCriado' => 'Alteração feita com sucesso!']);
            } catch (ValidationException $e) {
                return redirect('dnpt/admin/clientes/create')
                    ->withInput()
                    ->withErrors($validator);
            }
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param UserHandler $userHandler
     * @return Application|RedirectResponse|Response|Redirector|void
     */
    public function destroy(int $id, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 1) {
            $userHandler->apagarCliente($id);
            return redirect("dnpt/admin/clientes")->withErrors(['clienteEliminado' => 'Cliente eliminado com sucesso!']);
        }else {
            abort(404, 'Page not found');
        }
    }

    /**
     * @param int $id
     * @return Application|RedirectResponse|Redirector|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function alteracaoPassword(int $id)
    {
        if(Auth::user()->admin == 1) {
            $validator = $this->validate(request(),
                [
                    self::PASSWORD => 'required|string|confirmed|min:8',
                ]
            );

            $userHandler = new UserHandler();
            try {
                $userHandler->alterarPassword(
                    $id,
                    request(self::PASSWORD)
                );

                return redirect("dnpt/admin/clientes/{$id}")->withErrors(['passwordAlterada' => 'Password alterada com sucesso!']);
            } catch (ValidationException $e) {
                return redirect("dnpt/admin/clientes/{$id}")
                    ->withInput()
                    ->withErrors($validator);
            }
        }else {
            abort(404, 'Page not found');
        }
    }
}

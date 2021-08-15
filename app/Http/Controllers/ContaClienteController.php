<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserHandler;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaClienteController extends Controller
{
    const PASSWORD = "password";
    const TELEMOVEL = "telemovel";
    const DATA_NASCIMENTO = "data_nascimento";
    const PROFISSAO = "profissao";
    const NOME = "nome";

    public function updateConta ()
    {
        if(Auth::user()->admin == 0) {
            $validator = $this->validate(request(),
                [
                    self::NOME => "required",
                    self::DATA_NASCIMENTO => 'required',
                    self::TELEMOVEL => 'nullable|integer',
                    self::PROFISSAO => 'required',
                ]
            );

            try {
                (new UserHandler)->updateCliente(
                    Auth::user()->id,
                    request(self::NOME),
                    request(self::TELEMOVEL),
                    request(self::DATA_NASCIMENTO),
                    request(self::PROFISSAO)
                );
                return redirect('conta')->withErrors(['clienteCriado' => 'Alteração feita com sucesso!']);
            } catch (ValidationException $e) {
                return redirect('conta')
                    ->withInput()
                    ->withErrors($validator);
            }
        } else
            abort(404, 'Page not found');
    }

    public function alteracaoPassword()
    {
        if(Auth::user()->admin == 0) {
            $validator = $this->validate(request(),
                [
                    self::PASSWORD => 'required|string|confirmed|min:8',
                ]
            );

            $userHandler = new UserHandler();
            try {
                $userHandler->alterarPassword(
                    Auth::user()->id,
                    request(self::PASSWORD)
                );

                return redirect("conta")->withErrors(['passwordAlterada' => 'Password alterada com sucesso!']);
            } catch (ValidationException $e) {
                return redirect("conta")
                    ->withInput()
                    ->withErrors($validator);
            }
        } else
            abort(404, 'Page not found');
    }

    public function conta()
    {
        if(Auth::user()->admin == 0) {

            return view("cliente.conta",
                [
                    "cliente" => (new UserHandler)->getCliente(Auth::user()->id)
                ]
            );
        } else
            abort(404, 'Page not found');
    }
}

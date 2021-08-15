<?php

namespace App\Http\Controllers;

use App\Models\UserHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacaoFisicaController extends Controller
{
    public function avaliacaoFisica()
    {
        if(Auth::user()->admin == 0) {

            return view('cliente.avaliacao_fisica',
                [
                    "cliente" => (new UserHandler)->getCliente(Auth::user()->id),
                    "progressos" => (new UserHandler)->getProgressoCliente(Auth::user()->id),
                ]
            );
        } else
            abort(404, 'Page not found');
    }

    public function fotosCliente()
    {
        if(Auth::user()->admin == 0) {

            return view('cliente.fotos',
                [
                    "fotos" => (new UserHandler)->getFotosCliente(Auth::user()->id),
                ]
            );
        } else
            abort(404, 'Page not found');
    }
}

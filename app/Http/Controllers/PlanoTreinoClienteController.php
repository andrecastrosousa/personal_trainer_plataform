<?php

namespace App\Http\Controllers;

use App\Models\PlanoTreinoHandler;
use App\Models\UserHandler;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanoTreinoClienteController extends Controller
{
    public function planoCliente()
    {
        if(Auth::user()->admin == 0) {
            return view("cliente.plano_treino",
                [
                    "plano" => (new PlanoTreinoHandler)->getPlanoCliente(Auth::user()->id)
                ]
            );
        }else {
            abort(404, 'Page not found');
        }
    }

    public function exportarPdf()
    {
        if(Auth::user()->admin == 0) {

            $cliente = (new UserHandler)->getCliente(Auth::user()->id);
            $plano = (new PlanoTreinoHandler)->getPlanoCliente(Auth::user()->id);
            // share data to view
            view()->share('cliente', $cliente);
            view()->share('plano', $plano);

            return PDF::loadView('admin.planos.pdf_view', [$cliente, $plano])->stream();

        }else {
            abort(404, 'Page not found');
        }
    }
}

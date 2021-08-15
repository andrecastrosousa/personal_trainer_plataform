<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarioController extends Controller
{
    public function calendario()
    {
        if(Auth::user()->admin == 0) {

            $tasks = Event::all();
            return view('cliente.marcacoes', compact('tasks'));
        } else
            abort(404, 'Page not found');
    }
}

<?php

use App\Http\Controllers\FeedbackAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(\Illuminate\Support\Facades\Auth::user()->admin == 0) {
        return view('cliente.welcome');
    } else
        abort(404, 'Page not found');
})->middleware("auth")->name("homeUser");

Route::get('marcacoes', [\App\Http\Controllers\CalendarioController::class, "calendario"])->middleware("auth")->name("marcacao");
Route::get('plano_treino', [\App\Http\Controllers\PlanoTreinoClienteController::class, "planoCliente"])->middleware("auth")->name("planoTreino");
Route::get('exportar_pdf', [\App\Http\Controllers\PlanoTreinoClienteController::class, "exportarPdf"])->middleware("auth")->name("exportar_pdf");
Route::get('avaliacao_fisica', [\App\Http\Controllers\AvaliacaoFisicaController::class, "avaliacaoFisica"])->middleware("auth")->name("avaliacao_fisica");
Route::get('fotos', [\App\Http\Controllers\AvaliacaoFisicaController::class, "fotosCliente"])->middleware("auth")->name("fotos_cliente");
Route::get('conta', [\App\Http\Controllers\ContaClienteController::class, "conta"])->middleware("auth")->name("conta");
Route::post('alteracaoPassword', [\App\Http\Controllers\ContaClienteController::class, "alteracaoPassword"])->middleware("auth")->name("alterarPassword");
Route::post('updateConta', [\App\Http\Controllers\ContaClienteController::class, "updateConta"])->middleware("auth")->name("update_conta");
Route::resource('feedback', \App\Http\Controllers\FeedbackController::class)->middleware("auth");
Route::resource('avaliacao_inicial', \App\Http\Controllers\AvaliacaoInicialController::class)->middleware("auth");


Route::group(['prefix' => 'dnpt/admin', 'middleware' => 'auth'], function() {
    Route::get('dashboard', function () {return view('admin.dashboard');})->name('dashboard');
    Route::post('clientes/{id}/password_alteracao', [App\Http\Controllers\ClienteController::class, 'alteracaoPassword'])->name("clientes.alterarPassword");
    Route::get('exercicios/dashboard', [\App\Http\Controllers\ExercicioController::class, 'dashboardExercicios'])->name('exercicios.dashboard');
    Route::get('planos_treino', [\App\Http\Controllers\PlanoTreinoController::class, 'listarPlanos'])->name("planostreino");
    Route::get('planos_treino/criar', [\App\Http\Controllers\PlanoTreinoController::class, 'criarPlano'])->name("planostreino.criar");
    Route::post('planos_treino/comecar', [\App\Http\Controllers\PlanoTreinoController::class, 'comecarPlano'])->name("plano_treino.iniciar");
    Route::get('clientes/{$idCliente}/plano_treino/{$idPlano}/pdf', [\App\Http\Controllers\PlanoTreinoController::class, 'criarPDF'])->name("clientes.plano_treino.pdf");
    Route::resource('tipo_exercicios', \App\Http\Controllers\TipoExercicioController::class);
    Route::resource('clientes.plano_treino', \App\Http\Controllers\PlanoTreinoController::class);
    Route::resource('clientes.plano_treino.dia', \App\Http\Controllers\DiaController::class);
    Route::resource('clientes.plano_treino.dia.exercicio', \App\Http\Controllers\DiaExercicioController::class);
    Route::resource('clientes', \App\Http\Controllers\ClienteController::class);
    Route::resource('feedback_clientes', FeedbackAdminController::class);
    Route::resource('exercicios', \App\Http\Controllers\ExercicioController::class);
    Route::resource('cliente_avaliacao_inicial', \App\Http\Controllers\AvaliacaoInicialAdminController::class);
    Route::resource('cliente.fotos', \App\Http\Controllers\CarregarFotos::class);
    Route::resource('cliente.progresso', \App\Http\Controllers\ProgressoCliente::class);
    Route::resource('marcacoes', \App\Http\Controllers\EventoController::class);
    Route::resource('tarefas', \App\Http\Controllers\TarefaController::class);
});

require __DIR__.'/auth.php';

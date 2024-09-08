<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;


/**
 * Adicione e modifique rotas conforme necessário
 */

Route::get('/', [TarefaController::class, 'index']);

Route::get('/', function () {

    return view('welcome');
});

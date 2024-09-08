<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;


/**
 * Adicione e modifique rotas conforme necessário
 */

 Route::resource('tarefas', TarefaController::class);  // Rotas para o recurso Tarefa
 Route::post('tarefas/{id}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');

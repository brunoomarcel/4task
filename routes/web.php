<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;


/**
 * Adicione e modifique rotas conforme necessário
 */

 Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');

 Route::resource('tarefas', TarefaController::class);  // Rotas para o recurso Tarefa
 Route::post('tarefas/{id}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');
 Route::delete('tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

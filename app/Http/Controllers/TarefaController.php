<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        // $tarefas = ???
        // Recupera todas as tarefas do banco de dados
        $tarefas = Tarefa::all();

        return view('tarefas.index', compact('tarefas'));
    }
}

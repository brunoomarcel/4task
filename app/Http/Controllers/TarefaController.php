<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    
    public function index()
    {   

        // $tarefas = ???

        return view('tarefas.index'); // Liste as tarefas aqui
    }
}

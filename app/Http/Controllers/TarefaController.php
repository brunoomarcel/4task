<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();  // Recupera todas as tarefas do banco de dados
        return view('tarefas.index', compact('tarefas'));  // Passa as tarefas para a view
    }

    // Função para exibir o formulário de criação
    public function create()
    {
        return view('tarefas.create');  // Retorna a view de criação de tarefa
    }

    // Função para armazenar a nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'nullable',
            'status' => 'required|in:pendente,concluída',
        ]);

        Tarefa::create($request->all());  // Cria a nova tarefa com os dados do formulário

        return redirect()->route('tarefas.index')->with('success', 'Tarefa adicionada com sucesso!');  // Redireciona para a lista de tarefas
    }

    // Exibir o formulário de edição
    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id); // Encontrar a tarefa pelo ID
        return view('tarefas.edit', compact('tarefa')); // Retornar a view de edição com a tarefa
    }

    // Atualizar a tarefa
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'nullable',
            'status' => 'required|in:pendente,concluída',
        ]);

        $tarefa = Tarefa::findOrFail($id); // Encontrar a tarefa pelo ID
        $tarefa->update($request->all()); // Atualizar a tarefa com os novos dados

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!'); // Redirecionar com mensagem de sucesso
    }

    //alterar status para concluída
    public function concluir($id)
    {
        $tarefa = Tarefa::findOrFail($id); // Encontrar a tarefa pelo ID
        $tarefa->status = 'concluída'; // Alterar o status para 'concluída'
        $tarefa->save(); // Salvar as alterações

        return redirect()->route('tarefas.index')->with('success', 'Tarefa marcada como concluída!'); // Redirecionar com mensagem de sucesso
    }


}

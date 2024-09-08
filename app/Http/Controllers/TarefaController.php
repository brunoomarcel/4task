<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    // Função para armazenar a nova tarefa
    public function store(Request $request)
    {
        $valor = $request->input('status');

        if ($valor == '') { //verificar se valor enviado é nulo
            $request->merge(['status' => 'pendente']);
        }

        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'nullable',
            'status' => 'required|in:pendente,concluída',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa adicionada com sucesso!');
    }

    // Exibir o formulário de edição
    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
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

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    //alterar status para concluída
    public function concluir($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->status = 'concluída';
        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa marcada como concluída!');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id); // Encontrar a tarefa pelo ID
        $tarefa->delete(); // realiza o soft delete

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }

}

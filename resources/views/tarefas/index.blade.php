@extends('layouts.app')  <!-- Estendendo o layout padrão -->

@section('content')
    <h1>Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-3">Adicionar Tarefa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->descricao }}</td>
                    <td>{{ $tarefa->status }}</td>
                    <td>
                        <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>


                        <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success" {{ $tarefa->status === 'concluída' ? 'disabled' : '' }}>
                                Marcar como concluída
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')  <!-- Estendendo o layout padrão -->

@section('content')
    <h1>Esse é um Protótipo do 4Task</h1>
    <h4>Um gerenciador de tarefas para você anotar suas tarefas e organizar o seu dia</h4>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-3">Adicionar Tarefa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
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
    </div>
    <footer>
        <div class="copywright">
            <p>Desenvolvido por Bruno Marcel</p>
            <p>4Task &copy; Todos os direitos reservados. </p>
        </div>
    </footer>
@endsection

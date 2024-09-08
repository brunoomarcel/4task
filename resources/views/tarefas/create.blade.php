@extends('layouts.app')

@section('content')
    <h1>Adicionar Tarefa</h1>

    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pendente">Pendente</option>
                <option value="concluída">Concluída</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

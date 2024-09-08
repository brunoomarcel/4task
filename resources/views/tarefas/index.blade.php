<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Tarefas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <div class="container">
        <h1 style="padding-top: 50px">Bem-vindo ao Gerenciador de Tarefas! 😁</h1>
        <p>Fique à vontade para modificar essa página.</p>
        @yield('content')  <!-- Aqui você vai injetar o conteúdo específico -->

        <h2>Tarefas</h2>
        <!-- Mensagem de sucesso, se existir -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabela para listar as tarefas -->
        <table class="table">
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
                            <!-- Botões para editar e excluir -->
                            <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                            <form action="{{ route('tarefas.concluida', $tarefa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Marcar como Concluída</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

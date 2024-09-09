# Sistema de Gerenciamento de Tarefas

Este projeto faz parte de um processo seletivo. Ele é um protótipo de um Gerenciador de Tarefas, desenvolvido com PHP 8.3, MySQL e utilizando o XAMPP como servidor local. O Bootstrap foi utilizado para facilitar o desenvolvimento rápido da interface.

# Tecnologias Utilizadas

- PHP 8.3: Linguagem principal usada no back-end.
- MySQL: Sistema de gerenciamento de banco de dados.
- XAMPP: Ferramenta usada como servidor local (contendo Apache e MySQL).
- Bootstrap: Framework CSS utilizado para agilizar a criação da interface responsiva.

# Funcionalidades Implementadas

- Listar Tarefas: Exibe todas as tarefas cadastradas no sistema.
- Adicionar Tarefa: Permite adicionar novas tarefas ao sistema com título, descrição e status.
- Editar Tarefa: Permite a edição de tarefas existentes.
- Marcar como Concluída: Permite marcar uma tarefa como concluída ou alterar o status.
- Excluir Tarefa (Soft Delete): Implementação de soft delete para que as tarefas não sejam removidas permanentemente do banco de dados.
- Restaurar Tarefa Excluída: Permite a restauração de tarefas excluídas.

# Estrutura do Projeto

# 1. Páginas de Visualização (Views):

Localizadas em: /resources/views/
Todas as páginas HTML foram construídas com o Blade Templating Engine do Laravel para simplificar a renderização de dados dinâmicos.

# 2. Controllers:

Localizados em: /app/Http/Controllers/
O controller principal é o TarefaController, responsável por gerenciar as requisições relacionadas às tarefas, incluindo exibição, adição, edição, conclusão e exclusão de tarefas.

# 3. Banco de Dados:

As migrações estão localizadas em: /database/migrations/
Foi implementado um script SQL para criar a tabela tarefas no banco de dados, contendo os seguintes campos:

- id: Chave primária, incrementada automaticamente.
- titulo: Título da tarefa.
- descricao: Descrição da tarefa.
- status: Indica se a tarefa está pendente ou concluída.
- created_at: Data de criação da tarefa.
- updated_at: Data de atualização da tarefa.
- deleted_at: Campo usado para soft delete

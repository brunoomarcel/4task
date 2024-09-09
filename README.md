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

# Instalação e Configuração

1. Clone o Repositório

git clone https://github.com/brunoomarcel/4task.git

2. Configuração do Banco de Dados

Crie um banco de dados MySQL com o nome 4task ou o nome de sua preferência.
Atualize o arquivo .env com as credenciais do banco de dados:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=4task
DB_USERNAME=root
DB_PASSWORD=suasenha

3. Executar as Migrações

- Após configurar o banco de dados, execute o comando para rodar as migrações:

php artisan migrate

4. Executar o Servidor

- Para iniciar o servidor local, execute:

php artisan serve

- Acesse o projeto no navegador via:

http://localhost:8000, ou localhost/seudiretorio/public

# Rotas Principais

GET /tarefas: Exibe a listagem de todas as tarefas.
GET /tarefas/create: Exibe o formulário para adicionar uma nova tarefa.
POST /tarefas: Salva uma nova tarefa.
GET /tarefas/{id}/edit: Exibe o formulário para editar uma tarefa existente.
PUT /tarefas/{id}: Atualiza uma tarefa existente.
DELETE /tarefas/{id}: Exclui (soft delete) uma tarefa.
PATCH /tarefas/{id}/concluir: Marca uma tarefa como concluída.
GET /tarefas/trashed: Exibe as tarefas excluídas.
PATCH /tarefas/{id}/restaurar: Restaura uma tarefa excluída.

# Design Responsivo

Utilizei Bootstrap para garantir que o sistema seja responsivo e funcione bem em diferentes tamanhos de tela. A tabela de tarefas, por exemplo, é exibida de forma responsiva usando overflow-x: auto para evitar que o layout seja quebrado em dispositivos móveis.

# Melhorias Futuras


- Autenticação de Usuários: Adicionar um sistema de login para gerenciar permissões de usuários.
- Filtros e Ordenação: Implementar filtros e ordenação na listagem de tarefas.
- Notificações: Adicionar notificações ao usuário para alertá-lo quando uma tarefa for concluída ou excluída.
- Painel de Administração: Criar um painel para gerenciar usuários e tarefas de maneira mais robusta.

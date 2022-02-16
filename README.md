<h1>DEVSNOTES - API construída em PHP no curso FullStack do b7Web</h1>

Funções do Projeto:
- Listar as anotações;
- Pegar informações de uma anotação;
- Inserir nova anotação;
- Atualizar uma anotação;
- Deletar uma anotação;

Estrutura de dados:
- local para armazenamento das anotações;
- id
- title
- body

Endpoints utilizados:
|METODOS | URL                          |arq                              |
---------|-------------------------------|----------------------------------|
|GET     |/api/notes                     |/api/getall                       |
|GET     |/api/notes/{id}                |/api/get.php?{id}                 |
|POST    |/api/notes                     |/api/insert.php (title, body)     |
|PUT     |/api/notes/{id}                |/api/update.php (id, title, body) |
|DELETE  |/api/notes/{id}                |/api/delete.php (id)              |

Ferramenta utilizada para os endpoints:

[https://resttesttest.com/]
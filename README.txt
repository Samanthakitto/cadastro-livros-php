Tema escolhido: Cadastro de livros (pode adaptar para filmes, tarefas, etc.)

Resumo do funcionamento:
- Usuário pode se cadastrar com login, senha e e-mail.
- Após login, usuário pode cadastrar, listar, editar e excluir itens (ex: livros).
- Cada item é associado ao usuário que o cadastrou.
- Controle de sessão para proteger páginas restritas.
- Validação de campos obrigatórios.
- Logout para encerrar a sessão.
- Apresentação visual básica (pode melhorar com CSS/Bootstrap).

Usuário/senha de teste:
- login: teste
- senha: teste123

Passos para instalação do banco:

1. Crie um banco de dados MySQL chamado `cadastro_livros`.
2. Execute o script SQL abaixo para criar as tabelas:

```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  login VARCHAR(50) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL
);

CREATE TABLE itens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  titulo VARCHAR(100) NOT NULL,
  descricao TEXT NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

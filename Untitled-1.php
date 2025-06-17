<?php
// Conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "escola_tecnica";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Tratamento do formulário
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];
    $matricula = $_POST["matricula"];

    $sql = "INSERT INTO alunos (nome, email, curso, matricula)
            VALUES ('$nome', '$email', '$curso', '$matricula')";

    if ($conexao->query($sql) === TRUE) {
        $mensagem = "✅ Aluno cadastrado com sucesso!";
    } else {
        $mensagem = "❌ Erro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Aluno</title>
  <style>
    body {
      background-color: #f0f4f8;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px #ccc;
      width: 300px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #1e90ff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #187bcd;
    }

    .mensagem {
      text-align: center;
      margin-top: 15px;
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Cadastro de Aluno</h2>
    <form action="" method="POST">
      <input type="text" name="nome" placeholder="Nome completo" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="curso" placeholder="Curso técnico" required>
      <input type="text" name="matricula" placeholder="Matrícula" required>
      <button type="submit">Cadastrar</button>
    </form>
    <?php if (!empty($mensagem)): ?>
      <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>
  </div>
</body>
</html>

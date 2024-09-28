<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <!-- O formulário abaixo envia os dados para a mesma página (PHP_SELF) usando o método POST -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id"><br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    require_once "../../Database.php";
    $localHost = 'localhost';
    $nomeBD = 'banco_sistema';
    $user = 'root';
    $senha = '';

    $bd = new Database($localHost, $nomeBD, $user, $senha );
    $conexao = $bd->getConnection();

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];

        $bdClientes = new DBClientes($conexao);
        if ($bdClientes->create($id, $nome, $cpf, $email)) {

            echo "Cliente inserido com sucesso !!!";
        }
        else {

            echo "Erro ao incluir cliente.";

        }
    }
    ?>
</body>
</html>

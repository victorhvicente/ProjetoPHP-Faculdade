<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="inserir.css" rel="stylesheet">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Cliente</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-cadastro">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" class="input-field"><br>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="input-field"><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="input-field"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="input-field"><br><br>
            <input type="submit" value="Enviar" class="btn-submit">
        </form>

        <?php
        require_once "../../Database.php";
        $localHost = 'localhost';
        $nomeBD = 'banco_sistema';
        $user = 'root';
        $senha = '';

        $bd = new Database($localHost, $nomeBD, $user, $senha );
        $conexao = $bd->getConnection();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];

            $bdClientes = new DBClientes($conexao);
            if ($bdClientes->create($id, $nome, $cpf, $email)) {
                echo "Cliente inserido com sucesso !!!";
            } else {
                echo "Erro ao incluir cliente.";
            }
        }
        ?>
    </div>
</body>
</html>


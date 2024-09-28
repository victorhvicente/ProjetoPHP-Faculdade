<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Visualizar Todos os Clientes</title>
</head>
<body>
    <div id="listaClientes">

    <h2>Lista de Clientes</h2>
        <?php

        require_once "../../Database.php";

        $localHost = 'localhost';
        $nomeBD = 'banco_sistema';
        $user = 'root';
        $senha = '';

        $bd = new Database($localHost, $nomeBD, $user, $senha );
        $conexao = $bd->getConnection();

        $bdClientes = new DBClientes($conexao);

        $listaClientes = $bdClientes->recovery();

        echo "<ul>";
        foreach($listaClientes as $cliente) {
            echo "<li>ID: " . $cliente['id'] . " - Nome: " . $cliente['nome'] . " - CPF: " . $cliente['cpf'] . " - Email: " . $cliente['email'] . "</li>";
        }
        echo "</ul>";

        ?>
    </div>
</body>
</html>
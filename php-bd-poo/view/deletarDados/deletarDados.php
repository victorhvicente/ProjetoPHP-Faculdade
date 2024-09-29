<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="deletar.css" rel="stylesheet">
    <title>Deletar dados Cliente</title>
</head>
<body>

    <div>

        <h2>Deletar dados do cliente<h2>

        <form method="POST" action="" >
            <h2>Informe o ID do cliente<h2>
            <input typo="text" id="id" name="id" placeholder="id do cliente" >
            <button type="submit">Apagar</button>
        </form>

    </div>

    <?php 

    require_once "../../Database.php";

    $localHost = 'localhost';
    $dbName = 'banco_sistema';
    $usuario = 'root';
    $senha = '';

    $db = new DataBase($localHost, $dbName, $usuario, $senha);
    $conexao = $db->getConnection();

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])){

        $id = $_POST['id'];

        $dbCliente = new DBClientes($conexao);

        if($dbCliente->delete($id)){

            echo "Dados do cliente" . $id . "deletado. ";
        }
        else{
            echo "Erro ao deletar dados do cliente. ";
        }
    }

    ?>
</body>
</html>
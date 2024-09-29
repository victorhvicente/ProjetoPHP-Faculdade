<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Buscar cliente pelo nome</title>
</head>
<body>
    <div id="listaClientes">

        <form method="POST" action="">
            <h2>Informe o nome do cliente</h2>

            <input type="text" id="nome" name="nome" placeholder="Nome do cliente" ><br><br>
            <button type="submite">Buscar Cliente</button>
        </form>

        <?php 

        require_once "../../Database.php";

        $localHost = 'localhost';
        $nomeBD = 'banco_sistema';
        $user = 'root';
        $senha = '';

        $db = new Database($localHost, $nomeBD, $user, $senha);
        $conexao = $db->getConnection();

        $bdClientes = new DBClientes($conexao);

        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])){

            $nomeCliente = $_POST['nome'];

            $cliente = $bdClientes->recoveryByName($nomeCliente);

            if($cliente){
                echo "<h2>Dados do cliente</h2>";
                echo "<p>ID: " . $cliente['id'] . "- Nome: " . $cliente['nome'] . "- CPF: " . $cliente['cpf'] . "- Email: " .$cliente['email'] . "</p>";
            }
            else{
                echo "Erro ao exibir dados do cliente: " . $nomeCliente;
            }

        }

        ?>

    </div>
</body>
</html>
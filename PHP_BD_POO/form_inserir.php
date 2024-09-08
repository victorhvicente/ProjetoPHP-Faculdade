<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <!-- O formulário abaixo envia os dados para a mesma página (PHP_SELF) usando o método POST -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    require_once  "Database.php";
    
    $bd = new Database('localhost', 'banco_sistema', 'root', '');
    $conexao = $bd->getConnection();

    if ($conexao) {
        echo "Conexão feita!<br>";
    } else {
        echo "Erro ao conectar ao banco de dados.<br>";
    }

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

        // Exibe os dados
        echo "<h2>Dados Recebidos:</h2>";
        echo "ID: " . $id . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "CPF: " . $cpf . "<br>";
        echo "Email: " . $email . "<br>";
    }

    // Exibe uma lista de todos os clientes registrados na tabela clientes
    $bdClientes = new DBClientes($conexao);
    $listaClientes = $bdClientes->recovery();
    if($listaClientes){
        echo "<h2>Lista de Clientes</h2>";
        echo "<ul>";
        foreach($listaClientes as $cliente){
            echo "<li>ID: " . $cliente['id'] . " - Nome: " . $cliente['nome'] . " - CPF: " . $cliente['cpf'] . " - Email: " . $cliente['email'] . "</li>";
        }
        echo "</ul>";
    }
    else {
        echo "Erro ao exibir lista de clientes";
    }

    //Exibe os dados de um determinado cliente pela busca do ID
    $id = 333;

    $clienteID = $bdClientes->recoveryById($id);
    if($clienteID){
        echo "<h2>Dados do cliente pelo ID</h2>";
        echo "<li>ID: " . $clienteID['id'] . " - Nome: " . $clienteID['nome'] . " - CPF: " . $clienteID['cpf'] . " - Email: " . $clienteID['email'] . "</li>";
    }
    else {
        echo "Erro ao exibir dados do cliente ID: " . $id;
    }

    //Exibe os dados de um determinado cliente pela busca do NOME
    $nome = "victor ";

    $clienteNome = $bdClientes->recoveryByName($nome);
    if($clienteNome){
        echo "<h2>Dados do cliente pelo NOME</h2>";
        foreach($clienteNome as $cliNome){
            echo "<li>ID: " . $cliNome['id'] . " - Nome: " . $cliNome['nome'] . " - CPF: " . $cliNome['cpf'] . " - Email: " . $cliNome['email'] . "</li>";
        }
    }
    else {
        echo "Erro ao exibir dados do cliente NOME: " . $nome . "Necessário Atualizar a variável" . "<br>";
    }

    //Atualiza os dados de algum cliente registrado

    $idUpdate = 44444;
    $novo_nome = "Victor Hugo";
    $novo_cpf = "11111111111";
    $novo_email = "vic@totmail.com";

    if($bdClientes->update($idUpdate, $novo_nome, $novo_cpf, $novo_email)){
        echo "<h2>Dados do cliente Atualizado do ID: " . $idUpdate . "</h2>";
    }
    else{
        echo "Erro ao atualizar novos dados do cliente. Necessário Atualizar a variável" . "<br>";
    }

    //Excluir um determinado Cliente pelo ID

    $idDelete = 33344;

    if ($bdClientes->delete($idDelete)) {
        echo "<h2>Cliente do ID: " . $idDelete . " excluido" . "</h2>";
    } else {
        echo "Erro ao excluir cliente. Necessário Atualizar a variável" . "<br>";
    }


    ?>
</body>
</html>

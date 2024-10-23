<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/styleInserir.css">
    <title>Inserir Registros Computadores</title>
</head>
<body>

<form method="post" action="" >

    <label for="nome">Descrição: </label>
    <input type="text" id="descricao" name="descricao" ><br>
    <label for="cpf">Fabricante: </label>
    <input type="text" id="fabricante" name="fabricante" ><br>
    <label for="email">Número Série: </label>
    <input type="text" id="numeroserie" name="numeroserie" ><br>
    <label for="email">Acessórios: </label>
    <input type="text" id="acessorios" name="acessorios" ><br><br>
    <input type="submit" value="Enviar" >

</form>

<?php 

require_once "Classes.php";

$local = 'localhost';
$nomeBanco = 'provap1';
$usuario = 'root';
$senha = '';


$banco = new Database($local, $nomeBanco, $usuario, $senha);
$conexao = $banco->getConnection();

if(!empty($_POST['descricao']) && !empty($_POST['fabricante']) && !empty($_POST['numeroserie']) && !empty($_POST['acessorios'])){

    $descricao = $_POST['descricao'];
    $fabricante = $_POST['fabricante'];
    $numeroSerie = $_POST['numeroserie'];
    $acessorios = $_POST['acessorios'];

    $computador = new Computador($conexao);

    if($computador->inserirRegistro($descricao, $fabricante, $numeroSerie, $acessorios)){

        echo "Computador Registrado. ";
    }
    else {
        echo "Erro ao registrar. ";
    }
}


?>

</body>
</html>
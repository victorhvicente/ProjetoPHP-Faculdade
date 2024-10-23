<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar um registro</title>
</head>
<body>
    <h2>Buscar um registro</h2>
    <form method="POST" action="">
        <input type="text" id="codigo" name="codigo" placeholder="Digite o código do computador" >
        <button type="submit">Buscar</button>
    </form>

    <?php
      require_once "Classes.php";

      $local = 'localhost';
      $nomeBanco = 'provap1';
      $usuario = 'root';
      $senha = '';

      $banco = new Database($local, $nomeBanco, $usuario, $senha);
      $conexao = $banco->getConnection();

      if(!empty($_POST['codigo'])){

        $codigo = intval($_POST['codigo']); 

        $computador = new Computador($conexao);

        $registro = $computador->buscarUmRegistro($codigo);

        if(!empty($registro)){
            echo "<p>Código: " . $registro['com_cod'] . " - Descrição: " . $registro['com_descricao'] . " - Fabricante: " . $registro['com_fabricante'] . " - Número Série: " . $registro['com_acessorios'] . "</p>";
        }
        else{
            echo "<p>Nenhum registro Encontrado</p>";
        }
      
    }
    ?>
</body>
</html>
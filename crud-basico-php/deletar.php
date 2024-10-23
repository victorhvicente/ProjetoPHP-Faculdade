<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Registro</title>
</head>
<body>
    <h2>Deletar registro</h2>

    <?php
    require_once "Classes.php";

    $local = 'localhost';
    $nomeBanco = 'provap1';
    $usuario = 'root';
    $senha = '';

    // Conectar ao banco de dados
    $banco = new Database($local, $nomeBanco, $usuario, $senha);
    $conexao = $banco->getConnection();

    if (!empty($_POST['id'])) {
        $codigo = intval($_POST['id']);
        $computador = new Computador($conexao);

        // Chama o método para deletar o registro
        if ($computador->deletarRegistro($codigo)) {
            echo "<p>Registro deletado com sucesso.</p>";
        } else {
            echo "<p>Erro ao deletar registro.</p>";
        }
    } else {
        echo "<p>Por favor, informe um código válido.</p>";
    }
    ?>
</body>
</html>

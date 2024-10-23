<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Registro</title>
</head>
<body>
    <h2>Alterar Registro</h2>

    <?php
    require_once "Classes.php";

    $local = 'localhost';
    $nomeBanco = 'provap1';
    $usuario = 'root';
    $senha = '';

    // Conectar ao banco de dados
    $banco = new Database($local, $nomeBanco, $usuario, $senha);
    $conexao = $banco->getConnection();
    $computador = new Computador($conexao);

    // Verificar se o ID foi passado pelo POST
    if (isset($_POST['id'])) {
        $codigo = intval($_POST['id']);

        // Processar a atualização quando o formulário for enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['descricao'])) {
            $descricao = $_POST['descricao'];
            $fabricante = $_POST['fabricante'];
            $acessorios = $_POST['acessorios'];

            // Atualizar o registro no banco de dados
            if ($computador->atualizarRegistro($codigo, $descricao, $fabricante, $acessorios)) {
                echo "<p>Registro atualizado com sucesso.</p>";
            } else {
                echo "<p>Erro ao atualizar o registro.</p>";
            }
        }

        // Recuperar os dados do registro para exibir no formulário
        $registro = $computador->buscarUmRegistro($codigo);

        if ($registro) {
            // Exibir o formulário com os dados atuais do registro
            ?>
            <form method="POST" action="">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" value="<?php echo $registro['com_descricao']; ?>"><br><br>

                <label for="fabricante">Fabricante:</label>
                <input type="text" id="fabricante" name="fabricante" value="<?php echo $registro['com_fabricante']; ?>"><br><br>

                <label for="acessorios">Número Série:</label>
                <input type="text" id="acessorios" name="acessorios" value="<?php echo $registro['com_acessorios']; ?>"><br><br>

                <input type="hidden" name="id" value="<?php echo $codigo; ?>">
                <button type="submit">Atualizar</button>
            </form>
            <?php
        } else {
            echo "<p>Registro não encontrado.</p>";
        }
    } else {
        echo "<p>ID do registro não fornecido.</p>";
    }
    ?>
</body>
</html>

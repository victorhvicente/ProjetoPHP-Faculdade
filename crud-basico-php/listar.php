<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/styleListar.css">
    <title>Listar todos os registros</title>
</head>
<body>
    <h2>Lista dos Registros</h2>
    
    <a href="inserir.php" class="btn-add">Adicionar</a> <!-- Botão para adicionar novo registro -->
    
    <?php 
    require_once "Classes.php";

    $local = 'localhost';
    $nomeBanco = 'provap1';
    $usuario = 'root';
    $senha = '';

    $banco = new Database($local, $nomeBanco, $usuario, $senha);
    $conexao = $banco->getConnection();
    $computadores = new Computador($conexao);

    $listaRegistros = $computadores->retornarRegistros();

    if (!empty($listaRegistros)) {
        echo "<table>";
        echo "<tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Fabricante</th>
                <th>Número Série</th>
                <th>Ações</th>
              </tr>";
        foreach ($listaRegistros as $comp) {
            echo "<tr>";
            echo "<td>" . $comp['com_cod'] . "</td>";
            echo "<td>" . $comp['com_descricao'] . "</td>";
            echo "<td>" . $comp['com_fabricante'] . "</td>";
            echo "<td>" . $comp['com_acessorios'] . "</td>";
            echo "<td>
                    <div class='acao-container'>
                        <form method='POST' action='alterar.php'>
                            <input type='hidden' name='id' value='" . $comp['com_cod'] . "'>
                            <button type='submit' class='btn-edit'>Editar</button>
                        </form>
                        <form method='POST' action='deletar.php'>
                            <input type='hidden' name='id' value='" . $comp['com_cod'] . "'>
                            <button type='submit' class='btn-delete'>Deletar</button>
                        </form>
                    </div>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum registro encontrado</p>";
    }
    ?>
</body>
</html>

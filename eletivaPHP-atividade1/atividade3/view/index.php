<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora de Preço de Custo</title>
</head>
<body>

    <div id="caixa">

    <form method="POST" action="../controller/processamento.php">
        <h2>Calcular Preço de Custo</h2>

        <label for="valorVenda">Valor de Venda</label>
        <input type="number" id="valorVenda" name="valorVenda" required><br><br>

        <label for="porcentagemLucro">Porcentagem de Lucro (%)</label>
        <input type="number" id="porcentagemLucro" name="porcentagemLucro" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <div id="resultado">
        <?php
        session_start();
        $precoCusto = $_SESSION["resultado"];

        echo "<h2> O preço de custo do produto é: R$ " . "<span style='color: red;'>" . number_format($precoCusto, 2, ',', '.') . "</span>" . "</h2>";
        ?>
    </div>

    </div>
</body>
</html>
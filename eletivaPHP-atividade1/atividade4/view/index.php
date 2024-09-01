<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora de Multa de Pesca</title>
</head>
<body>
    <div id="caixa">
        <h1>Calcular Multa de Pesca</h1>
        <form method="POST" action="../controller/processamento.php">
            <label for="peso">Peso do peixe (em kg): </label>
            <input type="number" id="peso" name="peso" required>
            <br><br>
            <input type="submit" value="Calcular">
        </form>

        <div id="resultado">
            <?php
            session_start();
            $multa = $_SESSION["multa"];

            echo "<h2>O valor da multa é: R$ " . "<span style='color: red;'>" . number_format($multa, 2, ',', '.') . "</span>" . "</h2>";
            ?>
        </div>
    </div>
</body>
</html>

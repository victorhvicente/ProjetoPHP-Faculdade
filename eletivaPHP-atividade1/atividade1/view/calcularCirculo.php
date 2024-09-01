<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora circulo</title>
</head>
<body>
    <div id="principal">
        <h2 class="cor" >Informe o raio do circulo</h2>
        <form method="POST" action="../controller/processamento.php">
            <label for="raioCirculo">Raio</label>
            <input type="number" id="raioCirculo" name="raioCirculo"></br>
            <input class="botao" type="submit" value="Calcular">
        </form>

        <?php

            session_start();

            if(!empty($_SESSION["area"])){
                echo "<h2 class='resultado'>A área do círculo é: " . $_SESSION["area"] . "</h2>";
            }

        ?>

        <p><a href="index.php">Voltar</a></p>
    </div>
</body>
</html>
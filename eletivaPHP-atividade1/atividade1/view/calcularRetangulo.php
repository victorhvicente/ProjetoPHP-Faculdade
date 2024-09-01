<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calcularora Retângulo</title>
</head>
<body>
    <div id="principal">
        <h2 class="cor">Informe a base e a altura do retângulo</h2>
        <form method="POST" action="../controller/processamento.php">
            <label for="baseRetangulo">Base</label>
            <input type="number" id="baseRetangulo" name="baseRetangulo">
            <label for="alturaRetangulo">Altura</label>
            <input type="number" id="alturaRetangulo" name="alturaRetangulo"></br>
            <input class="botao" type="submit" value="Calcular">
        </form>

        <?php
            session_start();

            if(!empty($_SESSION["area"])){

                $area = $_SESSION["area"];

                echo "<h2 class='resultado'>A area do retângulo é: " . $area . "</h2>";
            }
        ?>

        <p class="voltar"><a href="index.php">Voltar</a></p>
    </div>
</body>
</html>
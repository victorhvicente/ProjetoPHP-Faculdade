<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora triângulo</title>
</head>
<body>
    <div id="principal">
        <h2 class="cor">Informe a base e a altura do triângulo</h2>
        <form method="POST" action="../controller/processamento.php">
            <label for="baseTriangulo">Base</label>
            <input type="number" id="baseTriangulo" name="baseTriangulo">
            <label for="alturaTriangulo">Altura</label>
            <input type="number" id="alturaTriangulo" name="alturaTriangulo"></br>
            <input class="botao" type="submit" value="Calcular">
        </form>

        <?php
        session_start();

        if(!empty($_SESSION["area"])){

            echo "<h2 class='resultado'>A área do triângulo é: " . $_SESSION["area"] . "</h2>";
        }

        ?>

        <p><a href="index.php">Voltar</a></p>

     </div>
</body>
</html>
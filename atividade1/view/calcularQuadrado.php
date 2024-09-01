<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora quadrado</title>
</head>
<body>
    <div id="principal">
        <h2 class="cor">Informe o lado do quadrado</h2>
            <form method="POST" action="../controller/processamento.php">
                <label for="ladoQuadrado">Lado</label>
                <input type="number" id="ladoQuadrado" name="ladoQuadrado"></br>
                <input class="botao" type="submit" value="Calcular">
            </form>

            <?php
                session_start();

                if(!empty($_SESSION["area"])){

                    $area = $_SESSION["area"];

                    echo "<h2 class='resultado'>A area do Quadrado é: " . $area . "</h2>";
                }
            ?>
        
        <p><a href="index.php">Voltar</a></p>

    </div>
</body>
</html>
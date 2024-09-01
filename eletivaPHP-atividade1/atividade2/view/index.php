<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora</title>
</head>
<body>

    <div id="caixa">
        <form Method="POST" action="../controller/processamento.php">
            <h2>Calcular dígitos do número inteiro</h2>
            <input type="number" id="numero" name="numero" placeholder="Digite número inteiro" required></br></br>
            <input type="submit" value="Calcular">
        </form>

        <div id="resultado">
            <?php
            session_start();
            $resultado = $_SESSION["resultado"];

            if(isset($resultado)){

                echo "<h2> A soma de todos os dígitos do número inteiro é: " . "<span style='color: red;'>" . $resultado . "</span>" . "</h2>";
            }
            else {

                echo "nenhum resultado";
            }

            ?>
        </div>
    </div>

</body>
</html>
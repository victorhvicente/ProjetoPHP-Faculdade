<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema Price de Amortização</title>
</head>
<body>
    <h1>Calculadora de Financiamento - Sistema Price</h1>
    <form method="POST" action="../controller/processamento.php">
        <label for="valor">Valor do Empréstimo (R$): </label>
        <input type="number" id="valor" name="valor" step="0.01" required><br><br>

        <label for="juros">Taxa de Juros Mensal (%): </label>
        <input type="number" id="juros" name="juros" step="0.01" required><br><br>

        <label for="parcelas">Número de Parcelas: </label>
        <input type="number" id="parcelas" name="parcelas" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = $_POST["valor"];
        $taxaJuros = $_POST["juros"] / 100;  // Convertendo para decimal
        $parcelas = $_POST["parcelas"];

        // Cálculo da prestação (P)
        $prestacao = $valor * $taxaJuros * pow(1 + $taxaJuros, $parcelas) / (pow(1 + $taxaJuros, $parcelas) - 1);

        echo "<h2>Detalhes do Financiamento</h2>";
        echo "<p>Valor do Empréstimo: R$ " . number_format($valor, 2, ',', '.') . "</p>";
        echo "<p>Taxa de Juros Mensal: " . number_format($taxaJuros * 100, 2, ',', '.') . "%</p>";
        echo "<p>Número de Parcelas: $parcelas</p>";
        echo "<p>Valor da Prestação: R$ " . number_format($prestacao, 2, ',', '.') . "</p>";

        // Inicializando o saldo devedor
        $saldoDevedor = $valor;

        echo "<h3>Amortização Mensal</h3>";
        echo "<table border='1'>
                <tr>
                    <th>Parcela</th>
                    <th>Valor da Prestação (R$)</th>
                    <th>Valor dos Juros (R$)</th>
                    <th>Valor da Amortização (R$)</th>
                    <th>Saldo Devedor (R$)</th>
                </tr>";

        for ($mes = 1; $mes <= $parcelas; $mes++) {
            // Calculando os juros do período
            $jurosPeriodo = $saldoDevedor * $taxaJuros;
            // Calculando a amortização
            $amortizacao = $prestacao - $jurosPeriodo;
            // Atualizando o saldo devedor
            $saldoDevedor -= $amortizacao;

            echo "<tr>
                    <td>$mes</td>
                    <td>" . number_format($prestacao, 2, ',', '.') . "</td>
                    <td>" . number_format($jurosPeriodo, 2, ',', '.') . "</td>
                    <td>" . number_format($amortizacao, 2, ',', '.') . "</td>
                    <td>" . number_format(max($saldoDevedor, 0), 2, ',', '.') . "</td>
                  </tr>";
        }

        echo "</table>";
    }
    ?>
</body>
</html>

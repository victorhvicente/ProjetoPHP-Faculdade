<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('C:/xampp/htdocs/eletivaPHP/estruturaMVC/controller/ClienteController.php');

            foreach ($clientes as $cliente) { 
                echo "<tr>"
                    . "<td>" . $cliente['id'] . "</td>"
                    . "<td>" . $cliente['nome'] . "</td>"
                    . "<td>" . $cliente['email'] . "</td>"
                    . "<td>" . $cliente['telefone'] . "</td>"
                    . "</tr>"; 
            }
            ?>
        </tbody>
    </table>
</body>
</html>

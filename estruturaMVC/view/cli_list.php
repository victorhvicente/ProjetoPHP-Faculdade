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
                <tt>id</tt>
                <tt>nome</tt>
                <tt>email</tt>
                <tt>telefone</tt>
            </tr>
        </thead>
        <tbody>
            <?php

            require_once('C:/xampp/htdocs/eletivaPHP/estruturaMVC/controller/ClienteController.php');


            while ($cliente = $clientes->fetch(PDO::FETCH_ASSOC)) { 
                echo "<tr> <!-- um cliente -->"
                    . "<td>".$cliente['id']."</td>"
                    . "<td>".$cliente['nome']."</td>"
                    . "<td>".$cliente['email']."</td>"
                    . "<td>".$cliente['telefone']."</td>"
                    . "</tr>"; 
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/inserir_cliente.css" rel="stylesheet">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <form action="../controller/ClienteController.php" method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id">
        <label for="nome">Nome: </label>
        <input type="text" name="nome">
        <label for="email">Email: </label>
        <input type="text" name="email">
        <label for="telefone">Telefone: </label>
        <input type="text" name="telefone">
        <button type="submit">Enviar</button>
    </form>    
</body>
</html>
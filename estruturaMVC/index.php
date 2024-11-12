<?php

require_once "controller/ClienteController.php";

$clienteControlador = new ClienteController();

$clienteControlador->listarTodos();
?>
<?php

session_start();
require_once "../model/funcoes.php";

if(!empty($_POST["valorVenda"]) && !empty($_POST["porcentagemLucro"])){

    $valorVenda = $_POST["valorVenda"];
    $porcentagemLucro = $_POST["porcentagemLucro"];

    $resultado = CalcularPrecoCusto($valorVenda, $porcentagemLucro);

    $_SESSION["resultado"] = $resultado;

    header("Location: ../view/index.php");
    exit();

}



?>
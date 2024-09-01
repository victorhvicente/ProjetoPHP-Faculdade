<?php

session_start();
require_once "../model/funcoes.php";

if(!empty($_POST["peso"])){

    $peso = $_POST["peso"];

    $multa = CalcularMultaPesca($peso);

    $_SESSION["multa"] = $multa;

    header("Location: ../view/index.php");
    exit();
}

?>
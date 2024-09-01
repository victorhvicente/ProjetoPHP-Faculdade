<?php

session_start();
require_once "../model/funcoes.php";

if(!empty($_POST["raioCirculo"])){

    $raio = $_POST["raioCirculo"];
    
    $area = CalcularAreaCirculo($raio);

    $_SESSION['area'] = $area;

    header("location: ../view/calcularCirculo.php");
    die();
}

if(!empty($_POST["baseTriangulo"]) && !empty($_POST["alturaTriangulo"])){

    $base = $_POST["baseTriangulo"];
    $altura = $_POST["alturaTriangulo"];

    $area = CalcularAreaTriangulo($base, $altura);

    $_SESSION['area'] = $area;

    header("location: ../view/calcularTriangulo.php");
    exit();
}

if(!empty($_POST["baseRetangulo"]) && !empty($_POST["alturaRetangulo"])){

    $base =  $_POST["baseRetangulo"];
    $altura = $_POST["alturaRetangulo"];

    $area = CalcularAreaRetangulo($base, $altura);
    
    $_SESSION["area"] = $area;

    header("location: ../view/calcularRetangulo.php");
    exit();
}

if(!empty($_POST["ladoQuadrado"])){

    $lado = $_POST["ladoQuadrado"];
    
    $area = CalcularAreaQuadrado($lado);

    $_SESSION["area"] = $area;

    header("location: ../view/calcularQuadrado.php");
    exit();
}

?>
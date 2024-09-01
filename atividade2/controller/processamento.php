<?php

session_start();
require_once "../model/funcoes.php";

if(!empty($_POST["numero"])){

    $num = $_POST["numero"];
    $digitos = TransformarNumeroEmString($num);
    $digitosLen = strlen($digitos); //obtém o comprimento da string (número de dígitos).
    $soma = 0;

    for($i=0; $i <= $digitosLen; $i++){
        $soma = $soma + (int)$digitos[$i];
    }

    $_SESSION["resultado"] = $soma;

    header("location: ../view/index.php");
    exit();
}

else{

    header("location: ../view/index.php");
    exit();
}

?>
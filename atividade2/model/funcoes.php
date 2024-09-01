<?php

function TransformarNumeroEmString($numero){
    $strNumero = (string)$numero; //converte o número inteiro em uma string para que possamos acessar cada dígito individualmente.

    return $strNumero;
}
?>
<?php 

function CalcularAreaCirculo($raio){

    $area = pi() * pow($raio, 2);

    return ($area);
}

function CalcularAreaTriangulo($base, $altura){

    $area = ($base * $altura) / 2;

    return ($area);
}

function CalcularAreaQuadrado($altura){

    $area = pow($altura, 2);

    return ($area);
}

function CalcularAreaRetangulo($base, $altura){

    $area = ($base * $altura);

    return ($area);
}

?>
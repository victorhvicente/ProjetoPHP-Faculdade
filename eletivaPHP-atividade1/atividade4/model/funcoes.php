<?php

function CalcularMultaPesca($peso) {
    
    $limite = 50;
    $valorMulta = 4.00;
    $multa = 0;

    if($peso > $limite){

        $excesso = $peso - $limite;

        // Calcula a multa baseada no número de intervalos de 5 kg
        $multa = ceil($excesso / 5) * $valorMulta;
    }

    return $multa;
}





?>
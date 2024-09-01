<?php

function CalcularPrecoCusto($valorVenda, $porcLucro){

    $precoCusto = $valorVenda / (1 + ($porcLucro / 100));

    return $precoCusto;
}

?>
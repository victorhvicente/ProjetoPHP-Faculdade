<?php

class Calculadora {
    //Atributos
    private $resultado; //só aceita valores maiores ou a zero

    //Construtor
    public function __construct() {
        $this->resultado = 0;
    }

    public function getResultado () {
        return $this->resultado;
    }

    public function setResultado($novoResultado) {

        if($novoResultado >= 0) {
            $this->resultado = $novoResultado;
        }
        else $this->resultado = 0;
    }

    //Métodos
    public function somar($valor){

        $this->resultado += $valor;
    }

    public function subtrair($valor){
        $this->resultado -= $valor;
    }

    public function multiplicar($valor){
        $this->resultado *= $valor;
    }

    public function divisao($valor){
        if($valor == 0){
            return throw new Exception("Error...");
        }
        $this->resultado /= $valor;
    }
}

$Calc = new Calculadora();
echo "Calculadora foi iníciada! <br><br>";
echo "Valor inícial é = " . $Calc->getResultado() . "<br><br>";

// Calculando

//Somando
$Calc -> setResultado(10);
echo "O valor atual é : " . $Calc->getResultado() . "<br><br>";

$Calc -> somar(30);
echo "Com a soma o valor atual é : " . $Calc->getResultado() . "<br><br>";

// Subtraindo
$Calc -> subtrair(10);
echo "Com a subtração o valor atual é : " . $Calc->getResultado() . "<br><br>";

// Multiplicando
$Calc -> multiplicar(10);
echo "Com a multiplicação o valor atual é : " . $Calc->getResultado() . "<br><br>";

try {
    $Calc -> divisao(2);
    echo "Resultado = ".$Calc->getResultado()."<br>";
}
catch (Exception $ex) {
    echo "Erro: Você tentou dividir por zero";
}

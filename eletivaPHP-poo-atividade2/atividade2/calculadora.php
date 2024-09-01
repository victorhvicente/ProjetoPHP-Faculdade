<?php

class Calculadora {
    public $res;
    public $mem;

    function __construct(){
        $this->res = 0;
        $this->mem = 0;
    }

    function getRes(){
        return $this->res;
    }

    public function somar(float $numero){
        $this->res += $numero;
        $this->mem = $this->res;
    }

    public function subtrair(float $numero){
        $this->res -= $numero;
        $this->mem = $this->res;
    }

    public function multiplicar(float $numero){
        $this->res *= $numero;
        $this->mem = $this->res;
    }

    public function divisao(float $numero){
        if($numero != 0){
            $this->res /= $numero;
            $this->mem = $this->res;
        }
        else {
            throw new Exception("Erro, Divisão por 0 não permitida.");
        }
    }

    public function potencia(float $numero){
        $this->res = pow($this->res, $numero);
        $this->mem = $this->res;
    }

    public function porcentagem(int $numero){
        $this->res *= ($numero / 100);
        $this->mem = $this->res;  
    }

    public function raizQuadrada(){
        if($this->res >= 0){
            $this->res = sqrt($this->res);
            $this->mem = $this->res;
        }
        else{
            throw new Exception("Raíz Quadrada de número negativo não permitida");
        }
    }
    
    public function zerar(){
        $this->res = 0;
    }
}

$calc = new Calculadora();

// somando
$calc->somar(10);
echo "O Valor atual é: " . $calc->getRes() . "<br><br>";
// somando
$calc->somar(9);
echo "O resultado após a soma é: " . $calc->getRes() . "<br><br>";

$calc->subtrair(9);
echo "O resultado após a subtração é: " . $calc->getRes() . "<br><br>";

$calc->multiplicar(2);
echo "O resultado após a multiplixação é: " . $calc->getRes() . "<br><br>";

$calc->divisao(2);
echo "O resultado após a divisão é: " . $calc->getRes() . "<br><br>";

$calc->potencia(5);
echo "O resultado após calcular a potência é: " . $calc->getRes() . "<br><br>";

$calc->raizQuadrada(5);
echo "O resultado após calcular a raíz quadrada é: " . $calc->getRes() . "<br><br>";

$calc->zerar();
echo "Resultado após zerar as operações: " . $calc->getRes();

?>
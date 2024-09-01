<?php

class Carro {
    private $consumoCombustivel;
    private $nivelCombustivel;

    public function __construct(float $consumo) {
        $this->consumoCombustivel = $consumo;
        $this->nivelCombustivel = 0;
    }

    public function andar(float $distancia){
        $combustivelNecessario = $distancia / $this->consumoCombustivel;

        if($combustivelNecessario <= $this->nivelCombustivel){
            $this->nivelCombustivel -= $combustivelNecessario;
        }
        else{
            echo "Combustível insuficiente para percorrer a distância de " . $distancia . " km.<br>";
        }
    }

    public function getCombustivel(){
        return $this->nivelCombustivel;
    }

    public function setCombustivel(float $abastecer){
        if($abastecer > 0){
            $this->nivelCombustivel += $abastecer;
        }
        else{
            echo "Insira um valor maior que 0.";
        }
        
    }
}


$Car = new Carro(15);

$Car->setCombustivel(10);
echo "Combustível atual: " . $Car->getCombustivel() . "<br><br>";

$Car->andar(100);
echo "Nível atual do combustível após andar 100km: " . $Car->getCombustivel() . "<br><br>";

$Car->andar(100);
echo "Nível atual do combustível após andar 100km: " . $Car->getCombustivel() . "<br><br>";




?>
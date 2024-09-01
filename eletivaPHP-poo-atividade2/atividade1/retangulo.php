<?php

Class Retangulo {

    private $largura;
    private $altura;

    function __construct(){

        $this->largura = 1;
        $this->altura = 1;

    }   

    public function getLargura(){
        return $this->largura;
    }

    public function setLargura($largura){
        $this->largura = $largura;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }

    public function calcularPerimetro(){
        
        $resultado = ($this->largura * 2) + ($this->altura * 2);
        return $resultado;
    }

    public function calcularArea(){
        return $resultado = $this->largura * $this->altura;
    }

    public function ehQuadrado(){
        if($this->altura == $this->largura){
            echo "é quadrado";
        }
        else{
            echo "não é quadrado";
        }
    }
}

$ret = new Retangulo();

$ret->setLargura(10);
$ret->setAltura(5);


echo "O Perímetro do retângulo é: " . $ret->calcularPerimetro() . "<br><br>";
echo "A Área do retângulo é: " . $ret->calcularArea() . "<br><br>";
echo $ret->ehQuadrado();



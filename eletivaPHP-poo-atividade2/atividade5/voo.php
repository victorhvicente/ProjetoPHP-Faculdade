<?php

class Voo {
    private $numeroVoo;
    private $data;
    private $assentos = [];

    public function __construct(int $numeroVoo, Data $data){
        $this->numeroVoo = $numeroVoo;
        $this->data = $data;
        $this->assentos = array_fill(0, 100, null); // Inicializa 100 assentos como desocupados (null)
    }

    public function getAssentoLivre(){
        for($i = 0; $i < count($this->assentos); $i++){
            if($this->assentos[$i] === null){
                return $i + 1;
            }
        }
        return "Não há assentos livres.";
    }

    public function verificaAssento(int $numeroAssento){
        // Ajusta o índice para o array
        $indice = $numeroAssento - 1;

        if ($indice < 0 || $indice >= count($this->assentos)) {
            echo "Número do assento inválido.";
            return false;
        }

        if ($this->assentos[$indice] !== null) {
            echo "O assento {$numeroAssento} está ocupado.";
            return false;
        } else {
            echo "O assento {$numeroAssento} está livre.";
            return true;
        }
    }

    public function ocupaAssento(int $numeroAssento) {
        $indice = $numeroAssento - 1;

        // Verifica se o número do assento é válido (entre 1 e 100)
        if ($indice < 0 || $indice >= count($this->assentos)) {
            echo "Número do assento inválido.";
            return false;
        }

        // Verifica se o assento já está ocupado
        if ($this->assentos[$indice] !== null) {
            echo "Assento já ocupado.";
            return false;
        }

        // Ocupa o assento
        $this->assentos[$indice] = 'ocupado';
        echo "Assento {$numeroAssento} foi ocupado com sucesso.";
        return true;
    }

    public function getVagas(){
        $totalAssentosLivres = 0;

        for($i = 0; $i < count($this->assentos); $i++){

            if($this->assentos[$i] === null){
                $totalAssentosLivres += 1;
            }
        }
        return $totalAssentosLivres;
    }

    public function getVoo(){
        return $this->numeroVoo;
    }

    public function getDataVoo(){
        return $this->data;
    }
}

require_once "../atividade4/data.php";

$dataVoo = new Data(25, 8, 2024);
$voo = new Voo(1, $dataVoo);

echo "Próximo assento livre: " . $voo->getAssentoLivre();
echo "<hr>";
$voo->ocupaAssento(1);
echo "<hr>";
$voo->verificaAssento(1);
echo "<hr>";
echo "Total de assentos vagos:  " . $voo->getVagas();
echo "<hr>";
echo "Número do voo: " . $voo->getVoo();
echo "<hr>";
echo "Data do Voo: " . $voo->getDataVoo();

$dataVoo2 = new Data(30, 8, 2024);
$voo2 = new Voo(10, $dataVoo2);

echo "Próximo assento livre: " . $voo2->getAssentoLivre();
echo "<hr>";
$voo2->ocupaAssento(95);
echo "<hr>";
$voo2->verificaAssento(95);
echo "<hr>";
echo "Total de assentos vagos:  " . $voo2->getVagas();
echo "<hr>";
echo "Número do voo: " . $voo2->getVoo();
echo "<hr>";
echo "Data do Voo: " . $voo2->getDataVoo();
?>

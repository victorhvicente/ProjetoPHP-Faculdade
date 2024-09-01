<?php

    class Data {
        private int $dia;
        private int $mes;
        private int $ano;

        public function __construct(int $dia = 0, int $mes = 0, int $ano = 0){
            $this->dia = $dia;
            $this->mes = $mes;
            $this->ano = $ano;
        }

        public function getDia(){
            return $this->dia;
        }

        public function setDia(int $dia){
            $this->dia = $dia;
        }

        public function getMes(){
            return $this->mes;
        }

        public function setMes(int $mes){
            $this->mes = $mes;
        }

        public function getAno(){
            return $this->ano;
        }

        public function setAno(int $ano){
            $this->ano = $ano;
        }

        public function incrementarDia(){
            $this->dia++;

            $diasNoMes = $this->getDiasNoMes($this->mes, $this->ano);

            if($this->dia > $diasNoMes){
                $this->dia = 1;
                $this->mes++;

                if($this->mes > 12) {
                    $this->mes = 1;
                    $this->ano++;
                }
            }
           
            return $this->dia;
        }

        public function decrementarDia(){
            $this->dia--;

            if($this->dia < 1 ){
                $this->mes--;
                $this->dia--;

                if($this->mes < 12){
                    $this->mes--;
                    $this->ano--;
                }
            }
        }
        
        private function getDiasNoMes(int $mes, int $ano): int {
            return cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        }

        public function retornaData(){
            return sprintf('%02d/%02d/%04d', $this->dia, $this->mes, $this->ano);
        }

        public function bissexto(){
            if($this->ano % 4 == 0 && $this->ano % 100 != 0){
                echo "O ano " . $this->ano . " é Bissexto";
            }
            else if($this->ano % 400 == 0){
                echo "O ano " . $this->ano . " é Bissexto";
            }
            else{
                echo "O ano " . $this->ano . " não é Bissexto";   
            }
        }

        public function subtrairData(Data $outraData) {
            $data1 = new DateTime("{$this->ano}-{$this->mes}-{$this->dia}");
            $data2 = new DateTime("{$outraData->ano}-{$outraData->mes}-{$outraData->dia}");
            
            $intervalo = $data1->diff($data2);
            
            return abs($intervalo->days);  // Retorna o número de dias entre as duas datas
        }

        public function compararData(Data $outraData){
            $data1 = new DateTime("{$this->dia}-{$this->mes}-{$this->ano}");
            $data2 = new DateTime("{$outraData->dia}-{$outraData->mes}-{$this->ano}");

            if($data1 == $data2){
                return 0;
            }
            else if($data1 > $data2){
                return 1;
            }
            else{
                return -1;
            }
        }

        public function __toString() {
            return $this->dia . '/' . $this->mes . '/' . $this->ano;
        }
    }

$data = new Data(25, 8, 2024);
$i = $data->incrementarDia();
echo "Nova Data após incrementar o próximo dia: " . $data->getDia() . "/" .  $data->getMes() . "/" . $data->getAno();
echo "<hr>";
$data2 = new Data(25, 8, 2024);
$i = $data2->decrementarDia();
echo "Nova Data após decrementar o próximo dia: " . $data2->getDia() . "/" .  $data2->getMes() . "/" . $data2->getAno();
echo "<hr>";
$retorno = $data->retornaData();
echo "Novo formato: " . $retorno;
echo "<hr>";
$data->bissexto();
echo "<hr>";
$resultado = $data->subtrairData($data2);
echo "Diferença entre dias: " . $resultado;
echo "<hr>";
$comparacao = $data->compararData($data2);
echo "Comparação com outra data: " . $comparacao;


?>
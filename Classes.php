<?php

class Database {

    private $host;
    private $namebd;
    private $user;
    private $password;
    private $Conn;

    public function __construct($local, $nome_banco, $usuario, $senha){
        $this->host = $local;
        $this->namebd = $nome_banco;
        $this->user = $usuario;
        $this->password = $senha;
        $this->Conn = $this->getConnection();
    }
   
    public function getConnection(){
        try{
            $conexao = new PDO( "mysql:host={$this->host};dbname={$this->namebd}", $this->user, $this->password);
        }
        catch(PDOException $e){
            echo "Erro ao conectao com o banco de dados. " . $e->getMessage();
        }

        return $conexao;
    }
}

class Computador {

    private $conexao;
    private $nomeTabela = 'computadores';

    public function __construct($conexaoBD){

        $this->conexao = $conexaoBD;
    }

    public function inserirRegistro($descricao, $fabricante, $numserie, $acessorios){
        
        $query = "INSERT INTO " . $this->nomeTabela . " (com_descricao, com_fabricante, com_numeroserie, com_acessorios) VALUES (:descricao, :fabricante, :numserie, :acessorios)";

        try{
            $result = $this->conexao->prepare($query);

            $result->bindParam(':descricao', $descricao);
            $result->bindParam(':fabricante', $fabricante);
            $result->bindParam(':numserie', $numserie);
            $result->bindParam(':acessorios', $acessorios);

            if($result->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            echo "Erro ao inserir registros. " . $e->getMessage();
        }
    }

    public function retornarRegistros(){
        $query = "SELECT * FROM " . $this->nomeTabela;

        try{
            $result = $this->conexao->prepare($query);

            $result->execute();

            $registros = $result->fetchALL(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo "Erro ao buscar todos os registros. " . $e->getMessage();
        }

        return $registros;
    }

    public function atualizarRegistro($codigo, $descricao, $fabricante, $acessorios) {
        $query = "UPDATE " . $this->nomeTabela . " 
                  SET com_descricao = :descricao, com_fabricante = :fabricante, com_acessorios = :acessorios 
                  WHERE com_cod = :codigo";
    
        try {
            $result = $this->conexao->prepare($query);
    
            // Associar os valores aos parâmetros
            $result->bindParam(':descricao', $descricao);
            $result->bindParam(':fabricante', $fabricante);
            $result->bindParam(':acessorios', $acessorios);
            $result->bindParam(':codigo', $codigo); 
    
            return $result->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar o registro: " . $e->getMessage();
            return false;
        }
    }
    
    

    public function deletarRegistro($cod){
        $query = "DELETE FROM " . $this->nomeTabela . " WHERE com_cod = :cod";

        try{
            $result = $this->conexao->prepare($query);
            
            $result->bindParam(":cod", $cod);

            $result->execute();

            if($result->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOExcepition $e){
            echo "Erro ao apagar dados do cliente. " . $e->getMessage();
        }
    }

    public function buscarUmRegistro($cod) {
        $query = "SELECT * FROM " . $this->nomeTabela . " WHERE com_cod = :cod";
    
        try {
            $result = $this->conexao->prepare($query);
            $result->bindParam(':cod', $cod, PDO::PARAM_INT);
            $result->execute();
    
            $registro = $result->fetch(PDO::FETCH_ASSOC);
    
            if ($registro) {
                return $registro;
            } else {
                return null; 
            }
        } catch (PDOException $e) {
            echo "Erro ao recuperar registro pelo código: " . $e->getMessage();
            return false;
        }
    }
    
}

?>
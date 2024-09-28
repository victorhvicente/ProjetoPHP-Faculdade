<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $DBConn;

    public function __construct($servidor, $nomeBanco, $usuario, $senha) {
        $this->host = $servidor;
        $this->db_name = $nomeBanco;
        $this->username = $usuario;
        $this->password = $senha;
        $this->DBConn = $this->getConnection();
    }

    public function getConnection() {
        try{
            $conexao = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        }
        catch(PDOException $e){
            echo "Error. Erro com conexão ao banco de dados." . $e->getMessage();
            exit();
        }

        return $conexao;
    }
}

class DBClientes {
    private $conexao;
    private $tableName = 'clientes';

    public function __construct($conexaoBD) {
        $this->conexao = $conexaoBD;
    }

    public function create($id, $nome, $cpf, $email) {
        $query = "INSERT INTO " . $this->tableName .  " (id, nome, cpf, email) VALUES(:id, :nome, :cpf, :email)";

        try{

            $result = $this->conexao->prepare($query);

            $result->bindParam(':id', $id);
            $result->bindParam(':nome', $nome);
            $result->bindParam(':cpf', $cpf);
            $result->bindParam(':email', $email);

            if($result->execute()){
                return true;
            }
            else{
                return false;
            };
        }
        catch(PDOException $e){
            echo "Erro PDO." . $e->getMessage();
        }
    }

    public function recovery() {
        $query = "SELECT * FROM " . $this->tableName;

        try{
            $result = $this->conexao->prepare($query);
            $result->execute();

            $dados = $result->fetchALL(PDO::FETCH_ASSOC);
        }
        catch(PDOExceptiom $e){
            echo "Erro ao recuperar clientes: " . $e->getMessage();
        }

        return $dados;
    }

    public function recoveryById($idBusca) {
        $query = "SELECT * FROM " . $this->tableName . " WHERE id = :id";

        try{

            $result = $this->conexao->prepare($query);

             // Vincula o parâmetro :id ao valor de $idBusca
            $result->bindParam(":id", $idBusca, PDO::PARAM_INT);

            $result->execute();

            $cliente = $result->fetch(PDO::FETCH_ASSOC);

            // Verifica se o cliente foi encontrado
            if ($cliente) {
                return $cliente;
            } else {
                echo "Cliente não encontrado.";
                return null;
            }
        }
        catch(PDOException $e){
            echo "Erro ao recuperar cliente: " . $e->getMessage();
        }
    }

    public function recoveryByName($nomeBusca) {
        // retorna a linha da tabela com o nome igual
    }

    public function update($id, $nome, $CPF, $email) {
        // atualiza o ID com os dados do paramentro - UPDATE
    }

    public function delete($id) {
        // excluir do banco o cliente com id - DELETE
    }
}








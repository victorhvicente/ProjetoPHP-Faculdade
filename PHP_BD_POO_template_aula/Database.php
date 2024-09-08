<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $DBConn; // conexao com o banco

    public function __construct($servidor, $nomeBanco, $usuario, $senha) {
        $this->host = $servidor;
        $this->db_name = $nomeBanco;
        $this->username = $usuario;
        $this->password = $senha;
    }

    public function getConnection() {
        try{
            $this->DBConn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);      
        }
        catch(PDOException $e){
            echo "Error: Erro de conexão com o banco de dados." . $e->getMessage();
            die();
        }
        return $this->DBConn;
    }
    
}

class DBClientes {
    private $conexao;
    private $tableName = 'clientes';

    public function __construct($conexaoBD) {
        $this->conexao = $conexaoBD;
    }

    public function create($id, $nome, $cpf, $email) {
        
        $query = "INSERT INTO " . $this->tableName . "(id, nome, cpf, email) VALUES (:id, :nome, :cpf, :email)";

        try{
            $result = $this->conexao->prepare($query);
    
            $result->bindParam(":id", $id);
            $result->bindParam(":nome", $nome);
            $result->bindParam(":cpf", $cpf);
            $result->bindParam(":email", $email);
    
            $result->execute();
        }
        catch(PDOException $e){
            echo "Erro com PDO." . $e->getMessage();
        }
      
    }

    public function recovery() {

        $query = "SELECT * FROM " . $this->tableName;

        try{
            $result = $this->conexao->prepare($query);

            $result->execute();

            $dados = $result->fetchAll(PDO::FETCH_ASSOC);

            return $dados;
        }
        catch(PDOException $e){
            echo "Erro ao recuperar clientes: " . $e->getMessage();
        }
    }

    public function recoveryById($idBusca) {
        
        $query = "SELECT * FROM " . $this->tableName . " WHERE id = :id";

        try{
            $result = $this->conexao->prepare($query);

            $result->bindParam(":id", $idBusca, PDO::PARAM_INT);

            $result->execute();

            $cliente = $result->fetch(PDO::FETCH_ASSOC);

            return $cliente;
        }
        catch(PDOException $e){
            echo "Erro ao recuperar cliente: " . $e->getMessage();
        }
    }

    public function recoveryByName($nomeBusca) {
        // retorna a linha da tabela com o nome igual
        $query = "SELECT * FROM " . $this->tableName . " WHERE nome = :nome";

        try{
            $result = $this->conexao->prepare($query);

            $result->bindParam(":nome", $nomeBusca, PDO::PARAM_STR);

            $result->execute();

            $cliente = $result->fetchALL(PDO::FETCH_ASSOC);

            return $cliente;
        }
        catch(PDOException $e){
            echo "Erro ao recuperar cliente: " . $e->getMessage();
        }
    }

    public function update($id, $nome, $cpf, $email) {
        $query = "UPDATE " . $this->tableName . " SET nome = :nome, cpf = :cpf, email = :email WHERE id = :id";

        try{
            $result = $this->conexao->prepare($query);

            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->bindParam(":nome", $nome, PDO::PARAM_STR);
            $result->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $result->bindParam(":email", $email, PDO::PARAM_STR);

            $result->execute();

             // Verificar o número de linhas afetadas para determinar se a atualização foi bem-sucedida
            if ($result->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        catch (PDOException $e) {
            // Exibir mensagem de erro e retornar false em caso de exceção
            echo "Erro ao atualizar cliente: " . $e->getMessage();
        }
    }

    public function delete($id) {
        // excluir do banco o cliente com id - DELETE
    }
}








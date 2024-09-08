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
            $conexao = new PDO('mysql:host={$this->host};dbname={$this->db_name}', $this->username, $this->password);
            $this->DBConn = $conexao;        
        }
        catch(PDOException $e){
            echo "Error: Erro de conexão com o banco de dados." . $e->getMessage();
            die();
        }
    }
}

class DBClientes {
    private $conexao;
    private $tableName = 'clientes';

    public function __construct() {
    }

    public function create($id, $nome, $cpf, $email) {
        // executar INSERT * from clientes

        // return $dados
    }

    public function recovery() {
        // executar SELECT * from clientes

        // return $dados
    }

    public function recoveryById($idBusca) {
        // return a linha da tabela com id igual ao parametro
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








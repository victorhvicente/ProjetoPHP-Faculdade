<?php
class Cliente {
    private $conexao;
    private $tableName = "cliente";  // Nome da tabela no banco

    // Atributos para armazenar os dados do cliente
    private $id;
    private $nome;
    private $email;
    private $telefone;

    // Construtor que recebe a conexão com o banco de dados
    public function __construct($db){
        $this->conexao = $db;
    }

    public function inserirCliente($id, $nome, $email, $telefone): bool {
        try {
            $comandoSQL = "INSERT INTO " . $this->tableName . " (id, nome, email, telefone) 
                           VALUES (:id, :nome, :email, :telefone)";
            
            // Preparar a consulta
            $acesso = $this->conexao->prepare($comandoSQL);
            
            // Bind dos parâmetros
            $acesso->bindParam(":id", $id, PDO::PARAM_INT);
            $acesso->bindParam(":nome", $nome, PDO::PARAM_STR);
            $acesso->bindParam(":email", $email, PDO::PARAM_STR);
            $acesso->bindParam(":telefone", $telefone, PDO::PARAM_STR);
            
            // Tentar executar e verificar se deu certo
            if ($acesso->execute()) {
                return true; 
            } else {
                throw new Exception("Erro ao executar a consulta.");
            }
        } catch (Exception $e) {
            // Exibe o erro que ocorreu durante a execução
            echo "Erro: " . $e->getMessage();
            return false;  
        }
    }

    // Função para carregar todos os clientes do banco de dados
    public function carregarTodos() {
        
        $comandoSQL = "SELECT * FROM " . $this->tableName;
        $acesso = $this->conexao->prepare($comandoSQL);

        // Executa a consulta
        if ($acesso->execute()) {
        
            return $acesso->fetchAll(PDO::FETCH_ASSOC);
        } else {
        
            return [];
        }
    }
}
?>

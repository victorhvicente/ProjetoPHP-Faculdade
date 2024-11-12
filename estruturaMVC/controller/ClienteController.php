<?php

require_once('C:/xampp/htdocs/eletivaPHP/estruturaMVC/model/Database.php');

require_once('C:/xampp/htdocs/eletivaPHP/estruturaMVC/model/Cliente.php');




class ClienteController {
    private $db;
    private $clienteModel;

    public function __construct(){
        $this->db = ( new Database())->getConnection();
        $this->clienteModel = new Cliente(db: $this->db);
    }

    public function incluir(): void {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            
            if(!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['telefone'])) {

                $id = (int) $_POST['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];

                $this->clienteModel->inserirCliente($id, $nome, $email, $telefone);
            }
        }

        else{

            echo "Por favor, Preencha todos os campos. ";
        }

        header('Location: index.php');  // Redireciona para a página principal após o envio
        exit();
    
    }

   

    public function listarTodos(): void {
        $clientes = $this->clienteModel->carregarTodos();

        require_once "view/cli_list.php";
    }

}
?>
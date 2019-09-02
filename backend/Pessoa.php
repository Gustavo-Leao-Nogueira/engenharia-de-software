<!DOCTYPE html>
<html lang="pt-br" ng-app="site" ng-controller="siteCtrl">
    <head>
        <meta charset="utf-8"/>
        
        <link rel="stylesheet" href="../node_modules/w3-css/3/w3.css"/>
        <script src="../node_modules/angular/angular.min.js"></script>
        <script src="../js/escript.js"></script>

        <title ng-bind="titulo"></title>
    </head>
    <body>

<?php

require 'Banco.php';

class Pessoa{
    private $banco;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $id;

    public function __construct(){
        $this->banco = new Banco('plate-shop', 'root', '');

        $this->setNome(null);
        $this->setEmail(null);
        $this->setSenha(null);
        $this->setTelefone(null);
        $this->setId(null);
    }

    public function setNome($nome){ $this->nome = $nome; }
    public function setEmail($email){ $this->email = $email; }
    public function setSenha($senha){ 
        if($senha != null){
            $this->senha = md5($senha);
        } 
        else{
            $this->senha = $senha;
        }
    }
    public function setTelefone($telefone){ $this->telefone = $telefone; }
    public function setId($id){ $this->id = $id; }

    public function isSetAll(){
        if(($this->getNome() == null) and ($this->getEmail() == null) and ($this->getSenha() == null) and ($this->getTelefone() == null) and ($this->getId() == null)){
            return false;
        }
        else{
            return true;
        }
    }

    public function getNome(){ return $this->nome; }
    public function getEmail(){ return $this->email; }
    public function getSenha(){ return $this->senha; }
    public function getTelefone(){ return $this->telefone; }
    public function getId(){ return $this->id; }

    public function getPessoa(){
        return array(
            ":id" => $this->getId(),
            ":nome" => $this->getNome(),
            ":email" => $this->getEmail(),
            ":telefone" => $this->getTelefone(),
            ":senha" => $this->getSenha()
        );
    }
    
    public function inserirPessoa(){        
        $sql = "INSERT INTO pessoa(id, nome, email, telefone, senha) VALUES(:id, :nome, :email, :telefone, :senha)";
        return $this->banco->inserir($sql, $this->getPessoa());
    }

    public function listarPessoas(){
        $sql = "SELECT * FROM pessoa";
        return $this->banco->selecionar($sql);
    }

    public function contarPessoas(){
        $sql = "SELECT count(id) as pessoas FROM pessoa";
        return $this->banco->selecionar($sql);
    }

    public function listarPessoa($id){
        $sql = "SELECT * FROM pessoa WHERE id=:id";
        $arrayDeDados = array(':id' => $id);
        return $this->banco->selecionarWhere($sql, $arrayDeDados);
    }
}


$metodo = $_SERVER['REQUEST_METHOD'];


switch($metodo){
    case "GET":
        if(!isset($_GET['id'])){
            function listaDePessoas(){
                $pessoa = new Pessoa();
                $lista_de_pessoas = $pessoa->listarPessoas();
                echo '<label for="nomeDaPessoa">Escolha o cliente:</label>';
                echo '<select class="w3-select" name="nomeDaPessoa" id="nomeDaPessoa" autofocus required>';
                echo '<option value="">Selecione</option>';
                while($linha = $lista_de_pessoas->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="'.$linha['id'].'">';
                        echo $linha['nome'];
                    echo '</option>';
                }        
                echo '</select>';
            }  
            
        }
        else{
            $id = $_GET['id'];
            function listaPessoa($id){
                $pessoa = new Pessoa();
                $lista_de_pessoa = $pessoa->listarPessoa($id);
                while($linha = $lista_de_pessoa->fetch(PDO::FETCH_ASSOC)){
                    echo '<p><b>Nome:</b> '.$linha['nome']. '</p>';
                }        
            }
            listaPessoa($id);
        }
    break;
    case "POST":
        $pessoa = new Pessoa();
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];

        if(isset($nome) and isset($email) and isset($senha) and isset($telefone)){
            $pessoa->setNome($nome);
            $pessoa->setEmail($email);
            $pessoa->setSenha($senha);
            $pessoa->setTelefone($telefone);
            
            if($pessoa->isSetAll() == true){
                $linha = $pessoa->getPessoa();
                echo "<p><b>Nome:</b> ".$linha[':nome']."</p>";
                echo "<p><b>Email:</b> ".$linha[':email']."</p>";
                echo "<p><b>Telefone:</b> ".$linha[':telefone']."</p>";
                echo "<p><b>Senha:</b> ";
                for($i = 0; $i < strlen($linha[':senha']); $i++){
                    echo '*';
                }
                echo "</p>";
          

                if($pessoa->inserirPessoa()){
                    echo '<p class="w3-green w3-center">Salvo com sucesso, parabéns!</p>';
                }
                else{
                    echo '<p class="w3-red w3-center">Erro ao salvar, tente novamente!</p>';
                }
            }
        }
        else{
            echo '<p class="w3-red w3-center">Volte e tente novamente, pois ocorreu aum erro ao inseir.</p>';
        }
    break;

}

?>

</body>
</html>
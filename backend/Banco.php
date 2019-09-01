<?php 


class Banco{
    private $nome;
    private $usuario;
    private $senha;
    private $conexao;
    private $status;


    public function __construct($nome_do_banco, $usuario, $senha){
        $this->nome = "mysql:host=localhost;dbname=$nome_do_banco";
        $this->usuario = $usuario;
        $this->senha = $senha;
        
        $this->status = $this->conectado();
    }

    private function isConectado(){
        if($this->status == true){ return true; }
        else{ return false; }
    }
    public function conectado(){
        try{
            $this->conexao = new PDO($this->nome, $this->usuario, $this->senha);
            return true;
        }catch(PDOException $error){
            echo '<p class="w3-red w3-center">';
                echo 'Erro:'.$error->getMessage();
            echo '</p>';
            return false;
        }
    }
    public function selecionar($sql){
        try{
            if($this->isConectado() == false){
                $this->status = $this->conectado();      
            }
            else{
                $conexao = $this->conexao->query($sql);
                return $conexao;
            }
        }catch(PDOException $error){
            echo '<p class="w3-red w3-center">';
                echo 'Erro:'.$error->getMessage();
            echo '</p>';
            return false;
        }
    }
    public function inserir($sql, $arrayDeDados){
        try{
            if($this->isConectado() == false){
                $this->status = $this->conectado();      
            }
            else{
                $stmt = $this->conexao->prepare($sql);
                $stmt->execute($arrayDeDados);
                return $stmt->rowCount();
            }
        }catch(PDOException $error){
            echo '<p class="w3-red w3-center">';
                echo 'Erro:'.$error->getMessage();
            echo '</p>';
            return false;
        }
    }
}
?>
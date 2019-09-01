<?php 

require 'Banco.php';

class Placa{
    private $banco;
    private $altura;
    private $largura;
    private $frase;
    private $corDeFundo;
    private $corDaFrase;
    private $idCliente;
    private $id;

    public function __construct(){
        $this->banco =  new Banco('plate-shop', 'root', '');
        
        $this->setAltura(null);
        $this->setLargura(null);
        $this->setFrase(null);
        $this->setCorDeFundo(null);
        $this->setCorDaFrase(null);
        $this->setIdCliente(null);
        $this->setId(null);
    }


    public function setAltura($altura){ $this->altura = $altura; }
    public function setLargura($largura){ $this->largura = $largura; }
    public function setFrase($frase){ $this->frase = $frase; }
    public function setCorDeFundo($corDeFundo){ $this->corDeFundo = $corDeFundo; }
    public function setCorDaFrase($corDaFrase){ $this->corDaFrase = $corDaFrase; }
    public function setIdCliente($idCliente){ $this->idCliente = $idCliente; }
    public function setId($id){ $this->id = $id; }

    public function getAltura(){ return $this->altura; }
    public function getLargura(){ return $this->largura; }
    public function getFrase(){ return $this->frase; }
    public function getCorDeFundo(){ return $this->corDeFundo; }
    public function getCorDaFrase(){ return $this->corDaFrase; }
    public function getIdCliente(){ return $this->idCliente; }
    public function getId(){ return $this->id; }
    
    public function isSetAll(){
        if(($this->getAltura() == null) and ($this->getLargura() == null) and ($this->getFrase() == null) and ($this->getCorDeFundo() == null) and ($this->getCorDaFrase() == null) and ($this->getIdCliente() == null) and ($this->getId() == null)){
            return false;
        }
        else{
            return true;
        }
    }

    public function getPessoa(){
        return array(
            ":id" => $this->getId(),
            ":idCliente" => $this->getIdCliente(),
            ":altura" => $this->getAltura(),
            ":largura" => $this->getLargura(),
            ":frase" => $this->getFrase(),
            ":corDeFundo" => $this->getCorDeFundo(),
            ":corDaFrase" => $this->getCorDaFrase()
        );
    }

    public function inserirPlaca(){
        $sql = "INSERT INTO placa(id, id_cliente, altura, largura, frase, cor_de_fundo, cor_da_frase) VALUES(:id, )";
    }

}

?>
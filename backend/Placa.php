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

    public function getPlaca(){
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
        $sql = "INSERT INTO placa(id, id_cliente, altura, largura, frase, cor_de_fundo, cor_da_frase) VALUES(:id, :idCliente, :altura, :largura, :frase, :corDeFundo, :corDaFrase)";
        return $this->banco->inserir($sql, $this->getPlaca());
    }

    public function listarPlacas(){
        $sql = "SELECT * FROM placa";
        return $this->banco->selecionar($sql);
    }
    public function contarPessoas(){
        $sql = "SELECT count(id) as pessoas FROM pessoa";
        return $this->banco->selecionar($sql);
    }
}


$metodo = $_SERVER['REQUEST_METHOD'];

switch($metodo){
    case "GET":
        function listaDePlaca(){
            $placa = new  Placa();
            $lista_de_placas = $placa->listarPlacas();
            echo '<label for="placa">Escolha a placa:</label>';
            echo '<select class="w3-select" name="placa" id="placa" autofocus required>';
            echo '<option value="">Selecione</option>';
            while($linha = $lista_de_placas->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'.$linha['id'].'>';
                    echo $linha['frase'];
                echo '</option>';
            }        
            echo '</select>';
        }
        function listaDePessoass(){
            $placa = new Placa();
            $lista_de_placas = $placa->contarPessoas();
            return $lista_de_placas;     
        } 
    break;
    case "POST":
        $placa = new  Placa();
        $altura = $_POST['altura'];
        $largura = $_POST['largura'];
        $frase = $_POST['frase'];
        $idCliente = $_POST['nomeDaPessoa'];
        $corDaFrase = $_POST['corDeTexto'];
        $corDeFundo = $_POST['corDeFundo'];

        if(isset($altura) and isset($largura) and isset($frase) and isset($idCliente) and isset($corDaFrase) and isset($corDeFundo)){
            $placa->setAltura($altura);
            $placa->setLargura($largura);
            $placa->setFrase($frase);
            $placa->setIdCliente($idCliente);
            $placa->setCorDaFrase($corDaFrase);
            $placa->setCorDeFundo($corDeFundo);

            if($placa->isSetAll() == true){
                $linha = $placa->getPlaca();
                echo "<p><b>Altura:</b> ".$linha[':altura']."</p>";
                echo "<p><b>Largura:</b> ".$linha[':largura']."</p>";
                echo "<p><b>Frase:</b> ".$linha[':frase']."</p>";
                echo "<p><b>Id do Cliente:</b> ".$linha[':idCliente']."</p>";
                echo "<p><b>Cor da Frase:</b> ".$linha[':corDaFrase']."</p>";
                echo "<p><b>Cor de Fundo:</b> ".$linha[':corDeFundo']."</p>";
            
                if($placa->inserirPlaca()){
                    echo '<p class="w3-green w3-center">Salvo com sucesso, parabéns!</p>';
                }
                else{
                    echo '<p class="w3-red w3-center">Erro ao salvar, tente novamente!</p>';
                }
            }            
        }
    break;
}
?>

</body>
</html>
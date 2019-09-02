<?php

function gerar_nome(){
    $nomes = array(
        "Ayla",
        "Zoé",
        "Liz",
        "Ana Paula",
        "Maitê",
        "Agatha",
        "Lis",
        "Jade",
        "Agnes",
        "Ohana",
        "Bella",
        "Pérola",
        "Aisha",
        "Jennifer",
        "Ester",
        "Gael",
        "Ravi",
        "Valentim",
        "Edson",
        "Lucca",
        "Levi",
        "Noah",
        "Theo",
        "Danilo",
        "Bento",
        "Benício",
        "Ícaro",
        "Isaque",
        "Leandro",
        "Samuel"
    );
    $sobrenomes = array(
        "Agostinho",
        "Aguiar",
        "Albuquerque",
        "Alegria",
        "Alencastro",
        "Almada",
        "Alves",
        "Alvim",
        "Amorim",
        "Andrade",
        "Antunes",
        "Aparício",
        "Apolinário",
        "Araújo",
        "Arruda",
        "Assis",
        "Assunção",
        "Ávila",
        "Azambuja",
        "Baptista",
        "Barreto",
        "Barros",
        "Beira Mar",
        "Belchior",
        "Belém",
        "Bernardes",
        "Bittencourt",
        "Boaventura",
        "Bonfim",
        "Botelho",
        "Brites",
        "Brito",
        "Caetano",
        "Calixto",
        "Camacho",
        "Camilo",
        "Capelo",
        "Castro",
        "Cavalcante",
        "Chaves",
        "Conceição",
        "Corte Real",
        "Cortês",
        "Coutinho",
        "Crespo",
        "Cunha",
        "Curado",
        "Custódio",
        "Córdoba",
        "Damásio",
        "Dantas",
        "Dias",
        "Dinís",
        "Domingues",
        "Dorneles",
        "dos Reis",
        "Drumond",
        "D’Ávila",
        "Escobar",
        "Espinosa",
        "Esteves",
        "Evangelista",
        "Farias",
        "Ferrari",
        "Figueiredo",
        "Figueiroa",
        "Flores",
        "Fogaça",
        "Freitas",
        "Frutuoso",
        "Furtado",
        "Félix",
        "Galvão",
        "Garcia",
        "Gaspar",
        "Gentil",
        "Geraldes",
        "Gil",
        "Godinho",
        "Gomes",
        "Gonzaga",
        "Goulart",
        "Gouveia",
        "Guedes",
        "Guimarães",
        "Guterres",
        "Góis",
        "Hernandes",
        "Hilário",
        "Hipólito",
        "Ibrahim",
        "Ilha",
        "Infante",
        "Jaques",
        "Jesus",
        "Jordão",
        "Lacerda",
        "Lancastre",
        "Leiria",
        "Lessa",
        "Machado",
        "Maciel",
        "Magalhães",
        "Maia",
        "Maldonado",
        "Marinho",
        "Marques",
        "Martins",
        "Medeiros",
        "Meireles",
        "Mello",
        "Mendes",
        "Menezes",
        "Mesquita",
        "Modesto",
        "Monteiro",
        "Morais",
        "Moreira",
        "Morgado",
        "Moura",
        "Muniz",
        "Neves",
        "Nogueira",
        "Novais",
        "Nóbrega",
        "Ornélas",
        "Oliveira",
        "Ourique",
        "Pacheco",
        "Padilha",
        "Paiva",
        "Paraíso",
        "Paris",
        "Peixoto",
        "Peralta",
        "Peres",
        "Pilar",
        "Pimenta",
        "Pinheiro",
        "Portela",
        "Quaresma",
        "Quarteira",
        "Queiroz",
        "Ramires",
        "Ramos",
        "Rebelo",
        "Resende",
        "Ribeiro",
        "Salazar",
        "Sales",
        "Salgado",
        "Salgueiro",
        "Sampaio",
        "Sanches",
        "Santana",
        "Siqueira",
        "Soares",
        "Subtil",
        "Tavares",
        "Taveira",
        "Teixeira",
        "Teles",
        "Torres",
        "Trindade",
        "Varela",
        "Vargas",
        "Vasconcelos",
        "Vasques",
        "Veiga",
        "Veloso",
        "Vidal",
        "Vieira",
        "Vilela",
        "Xavier",
        "Ximenes",
        "Xisco",
        "Zagalo",
        "Zanette",
        "Zaganelli"
    );
    $nome = array_rand($nomes, 1);
    $sobrenome = array_rand($sobrenomes, 2);
    $nome_completo = $nomes[$nome]." ".$sobrenomes[$sobrenome[0]]." ".$sobrenomes[$sobrenome[1]];
    return $nome_completo;
}

require 'Pessoa.php';
require 'Placa.php';

function gerarPessoa(){
    

    $nome = gerar_nome();
    $telefone = "(051) ".rand(1000, 99999)."-".rand(1000, 9999);
    $senha = "loremIpsum".rand(10000, 99999999999)."";   
    $tipos = array(
        "gmail.com",
        "outlook.com",
        "outlook.com.br",
        "hotmail.com"
    ); 
    $tipo = array_rand($tipos, 1);
    $email = strtolower(str_replace(array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', ' '),  array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '-'), $nome))."@".$tipos[$tipo];

    $pessoa = new Pessoa();
    $pessoa->setNome($nome);
    $pessoa->setTelefone($telefone);
    $pessoa->setSenha($senha);
    $pessoa->setEmail($email);

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
function gerarPlaca(){
    

    $largura = rand(10, 200);
    $altura = rand(10, 200);
    $frase = "Lorem Ipsum ".rand(10000, 99999999999)." Lorem Ipsum";

    $lista = listaDePessoass();
    while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
        $quantidade= $linha['pessoas'];
    }
    
    $idCliente = rand(0, $quantidade);
    $cores_fundo = array(
        "branco",
        "cinza"
    );    
    $cores_texto = array(
        "preto",
        "vermelho",
        "azul",
        "amarelo",
        "verde"
    );
    $corDaFraseTmp = array_rand($cores_texto, 1);
    $corDaFrase = $cores_texto[$corDaFraseTmp];
    $corDeFundoTmp = array_rand($cores_fundo, 1);
    $corDeFundo = $cores_fundo[$corDeFundoTmp];

    $placa = new Placa();
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
for($i = 0; $i < 20; $i++){
    //gerarPessoa();
    gerarPlaca();
}

?>
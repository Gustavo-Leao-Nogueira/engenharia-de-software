<!DOCTYPE html>
<html lang="pt-br" ng-app="site" ng-controller="siteCtrl">
    <head>
        <meta charset="utf-8"/>
        
        <link rel="stylesheet" href="../node_modules/w3-css/3/w3.css"/>
        <link rel="stylesheet" href="../css/estilo.css">

        <script src="../node_modules/angular/angular.min.js"></script>
        <script src="../js/escript.js"></script>

        <title ng-bind="titulo"></title>
    </head>
    <body>

  

    
    <h1 class="w3-center" ng-bind="titulo"></h1>
    <div class="w3-padding">
        <form action="../backend/Pessoa.php" method="POST" class="w3-card">
            <h2 class="w3-center w3-light-green w3-padding">
                Cadastro de Cliente:
            </h2>
            <div class="w3-padding w3-display-container">
                <label for="nome">
                    Digite o seu nome completo:
                </label>
                <input type="text" name="nome" id="nome" class="w3-input" placeholder="Nome completo" autocomplete autofocus required/>
                <label for="email">
                    Digite o seu email:
                </label>            
                <input type="email" name="email" id="email" class="w3-input" placeholder="Seu email" autocomplete required/>
                <label for="senha">
                    Digite a sua senha:                
                </label>
                <input type="password" name="senha" id="senha" class="w3-input" placeholder="Sua senha">
                <label for="telefone">
                    Digite seu telefone:
                </label>            
                <input type="tel" name="telefone" id="telefone" class="w3-input" placeholder="Seu telefone" autocomplete required/>

                <br>
                <input type="submit" class="w3-green w3-button w3-round" value="Enviar" />            
                <input type="reset" class="w3-red w3-button w3-round" value="Limpar" />
            </div>
        </form>  
    </div>
    
    <div class="w3-padding">
        <form action="../backend/Placa.php" method="POST" class="w3-card w3-display-container">
            <h2 class="w3-center w3-light-green w3-padding">
                Cadastro de Placa:
            </h2>
             
            <div class="w3-border w3-margin w3-white w3-card-4">           
                <div ng-class="[corDeInicio, corDeFundo, corDeTexto]" class="w3-round w3-padding">
                    <h2 class="w3-center w3-text-gray" ng-if="!frase" ng-bind="fraseInicial"></h2>
                    <h2 class="w3-center" ng-if="frase" ng-bind="frase"></h2>
                </div>
            </div> 

            <div class="w3-padding w3-row-padding ">
                
                <div class="w3-half">
                    <?php require '../backend/Pessoa.php'; listaDePessoas(); ?>
                    
                    <fieldset>
                        <legend>Tamanho da placa:</legend>
                        <label for="altura">
                            Digite a altura da placa:
                        </label>
                        <input type="number" class="w3-input" name="altura" id="altura" required/>
                        <label for="largura">
                            Digite a largura da placa:
                        </label>
                        <input type="number" class="w3-input" name="largura" id="largura" required/>
                    </fieldset>
                    <br>
                <input type="submit" class="w3-green w3-button w3-round" value="Enviar"  />            
                <input type="reset" class="w3-red w3-button w3-round" value="Limpar" ng-click="corDeFundo = 'branco'; corDeTexto = 'preto'; frase = ''" /> 
                </div>
                <div class="w3-half">
                <label for="frase">
                        Digite a frase da placa:
                    </label>
                    <input type="text" class="w3-input" placeholder="Frase da placa" name="frase" id="frase" ng-model="frase" required/>


                    <fieldset>
                        <legend>Cores da placa:</legend>
                        <label for="corDeFundo">
                            Selecione a cor de fundo da placa:
                        </label>
                        <select class="w3-select" name="corDeFundo" id="corDeFundo" ng-model="corDeFundo" ng-value="branco" required>
                            <option value="branco">Branca</option>
                            <option value="cinza">Cinza</option>
                        </select>

                        <label for="corDeTexto">
                            Selecione a cor de texto da placa:
                        </label>
                        <select class="w3-select" name="corDeTexto" id="corDeTexto" ng-model="corDeTexto" ng-value="preto" required>
                            <option value="preto">Preta</option>
                            <option value="amarelo">Amarelo</option>
                            <option value="azul">Azul</option>
                            <option value="verde">Verde</option>
                            <option value="vermelho">Vermelho</option>
                        </select>
                    </fieldset>

                           
                </div>

                 
            </div>
            

            
        </form>
    </div>

    </body>
</html>
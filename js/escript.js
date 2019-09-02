angular.module('site', []);
angular.module('site').controller('siteCtrl', ($scope) => {
    $scope.titulo = "Plate Shop";
    $scope.fraseInicial = "Frase da placa";
    
    $scope.corDeFundo = "branco";
    $scope.corDeTexto = "preto";

});
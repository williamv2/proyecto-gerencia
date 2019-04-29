var datos = angular.module('tnsangular',[]);

	datos.controller('controladorclientes', function ($scope, $http) {
		
		$scope.importarclientes =function () {
			
			$http.get('../modelo/clientes.php').then(function(datos){

				$scope.clientes = datos.data.results;

				console.log(datos.data.results);
			})
		}

		$scope.importarclientes();

		$scope.selectclient = function(cli){

			console.log(cli);

			$scope.clickclient = cli;
		}
	})


	datos.controller('controladormovimientos', function ($scope, $http) {
		
		$scope.importarmovimientos =function () {
			
			$http.get('../modelo/listarmov.php').then(function(datos){

				$scope.movimiento = datos.data.results;

				console.log(datos);
			})
		}

		$scope.importarmovimientos();

		/*$scope.selectclient = function(cli){

			console.log(cli);

			$scope.clickclient = cli;
		}*/
	})
	
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


			$http.get('https://tns.net.co:726/api/Tercero?empresa=VALIDACION&usuario=ADMIN&password=1&tnsapitoken=12345&&codcliente='+cli+'&codsucursal=00').then(function(datos){

				console.log(datos.data.results.Documentos);

				$scope.movimiento = datos.data.results.Documentos;
			})
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

	
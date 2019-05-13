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

			var uri='https://tns.net.co:726/api/Tercero?empresa=VALIDACION&usuario=ADMIN&password=1&tnsapitoken=12345&&codcliente='+cli+'&codsucursal=00';

			$http.get(uri).then(function(datos){1

				console.log(datos.data.results.Documentos);

				$scope.movimiento = datos.data.results.Documentos;
			})
		}
	})


	datos.controller('controladorpcliente', function ($scope, $http) {
		
		$scope.importarpcliente =function () {


			
			$http.get('../modelo/clientes.php').then(function(datos){

				$scope.pcli = datos.data.results;

			})
		}

		$scope.importarpcliente();

		/*$scope.selectclient = function(cli){

			console.log(cli);

			$scope.clickclient = cli;
		}*/


	})

	datos.controller('controladorpvendedor', function ($scope, $http) {
		
		$scope.importarpvendedor =function () {


			
			$http.get('../modelo/clientes.php').then(function(datos){

				$scope.pved = datos.data.results;

				console.log(datos);

			})
		}

		$scope.importarpvendedor();

		/*$scope.selectclient = function(cli){

			console.log(cli);

			$scope.clickclient = cli;
		}*/


	})
	
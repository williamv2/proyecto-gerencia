var datos = angular.module('tnsangular',['ng', 'angular-js-xlsx']);



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

			var uri="../modelo/listarmov.php?cliente="+cli;

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

		$scope.selectclient = function(cli){

			$scope.clickclient = cli;

			var uri="../modelo/listarmov.php?cliente="+cli;

			$http.get(uri).then(function(datos){1

				console.log(datos.data.results.Documentos);

				$scope.movimiento = datos.data.results.Documentos;
			})
		}


	})

	datos.controller('controladorpvendedor', function ($scope, $http) {
		
		$scope.importarpvendedor =function () {


			
			$http.get('../modelo/clientes.php').then(function(datos){

				$scope.pved = datos.data.results;

				console.log(datos);

			})
		}

		$scope.importarpvendedor();

		$scope.selectclient = function(ved){

			console.log(ved);

			$scope.pvendedor = ved;
		}


	})
	

	datos.controller('controladorpedido', function ($scope,$http,$filter) {
        $scope.name = "Select file";
        var name;
        var first_sheet_name;
        var jsonData;
        var newWorkBook;
        $scope.saveButton = true;
        var alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

        

        /**
         * Leer documento Excel
         */

        $scope.read = function (workbook) {

            $scope.saveButton = false;

            newWorkBook = workbook;

            first_sheet_name = newWorkBook.SheetNames[0];

            $scope.$apply(function(){

                jsonData = XLSX.utils.sheet_to_json(newWorkBook.Sheets[first_sheet_name]);
                jsonData[0]["rowIndex"] = "0";
                $scope.Elements = [jsonData[0]];

                for (var i = 1; i<jsonData.length;i++)
                {
                    $scope.Elements.push(
                        jsonData[i]
                    );
                    jsonData[i]["rowIndex"] = i;
                }
            });

            console.log(jsonData);

            $scope.articulo = jsonData;
        };



        $scope.sendData = function (){

        		var cliente = document.getElementById('pcliente').value;
        		var vendedor = document.getElementById('pvendedor').value;

        		var newdate;
        		newdate = $filter('date')($scope.pdatecre,'dd/MM/yyyy');
        		var newdatecredito = $filter('date')($scope.pfechvence,'dd/MM/yyyy');

        		var articulo;
        		for (var i = 0; i < $scope.articulo.length; i++) {
        			
        			for (var j = 0; j < $scope.articulo[i].length; i++) {
        				console.log($scope.articulo[i][j]);
        			}
        		}

				var data = JSON.stringify({OCODCOMP:$scope.pcodpedido,OCODPREFIJO:$scope.prepedido,ONUMERO:$scope.pnumero,OFECHA:newdate,OCODCLIENTE:cliente,OCODVENDEDOR:vendedor,OCODFORMAPAGO:$scope.data.model,OCODBANCO:$scope.pcontado,OFECHAVENCE:newdatecredito,OPLAZODIAS:$scope.plazodias,
					OITEMSPEDIDO:$scope.articulo});
				

				var config = {
		                headers : {
		                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
		                }
		            }

				console.log(data);

				var url = "../modelo/registrarpedido.php?datos="+data;

				var uri = "https://tns.net.co:726/api/Pedido?empresa=1090485981&usuario=ADMIN&password=HUSXNX&tnsapitoken=12345&codsucursal=00"

				$http.get(url).then(function(response){

					console.log(response.data);
				})
			};

    });

	datos.controller('controladorrecibo', function ($scope, $http, $filter) {
		
		$scope.sendDataRecibo =function () {

			var datecre = $filter('date')($scope.rdatecre,'dd/MM/yyyy');

			var cliente = document.getElementById('rcliente').value;

			var cobrador = document.getElementById('rvendedor').value;

			var documento = document.getElementById('rdocumento').value;

			var documento2 = documento.split(',');

			var fpago = document.getElementById('rfpago').value;

			var bfpago = document.getElementById('bfpago').value;

			var vfpago = document.getElementById('vfpago').value;

			var tfpago = document.getElementById('tfpago').value;

			var rprerecibo = document.getElementById('rprerecibo').value;

			var data2 = JSON.stringify({OCODCOMP:$scope.rcodrecibo,
				OCODPREFIJO:$scope.rprerecibo,
				OFECHA:datecre,
				OCODCLIENTE:cliente,
				OCODCOBRADOR:cobrador,
				OITEMSRECIBO:[{ONUMDOCUM:documento2[1],
					OITEM:001,
					OCODCONCEPTO:02,
					OCODTERCERO:documento2[3],
					OVALOR:documento2[2]}],
				OITEMSRECIBOFP:[{OFORMAPAGO:fpago,
					OCODBANCO:bfpago,
					OVALOR:vfpago,
					OCODTERCERO:tfpago}]
				});

			console.log(data2);

			var url = "../modelo/registrorecibo.php?datos="+data2;

			$http.get(url).then(function(response){

					console.log(response.data);
				})

			
		}

		



	})
	

	datos.directive('fdInput', [function () {
        return {
            link: function ($scope, element, attrs) {
                element.on('change', function  (evt) {
                    var files = evt.target.files;

                    $scope.name = files[0].name;

                });
            }
        };
    }]);

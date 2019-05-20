<!doctype html>
<html lang="en" ng-app="tnsangular">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/fe732c725a.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>

    <script src="../controlador/shim.js"></script>
    <script src="../controlador/xlsx.core.min.js"></script>
    <script src="../controlador/angular-js-xlsx.js"></script>

    <script src="../controlador/controlador.js"></script>


    <title>Proyecto TNS Papeleria Mary!</title>
  </head>
  <body>
  	<div class="container">
  	<div class="row">
  		<div class="col-sm-4">
  			<img src="https://tns-software.co/img/logoTNS.png" style="height: 100px">
  		</div>
  		<div class="col-sm-8">
        <br>
  			<div class="container"><h1>Proyecto TNS Papeleria Mary!</h1></div>
  		</div>
  	</div>	
    
    </div>
    <div class="container">
     
        <nav class="nav nav-pills nav-justified">
          <a class="nav-item nav-link active" href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Movimientos</a>
          <a class="nav-item nav-link button" href="" data-toggle="modal" data-target="#myModalAgree"><i class="fa fa-money" aria-hidden="true"></i> Registrar Recibo de Caja</a>
          <a class="nav-item nav-link button" href="" data-toggle="modal" data-target="#myModalAct"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Registrar Pedido</a>
        </nav>

      <div class="col-md-12" ng-controller="controladorclientes">
    	<hr>
      <form>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Cliente</label>
          </div>
          <select class="custom-select" id="cliente" name="cliente" ng-model="data.model" >
            <option selected value="">Seleccione...</option>
            <option ng-repeat="cli in clientes" value="{{cli.OCODIGO}}">{{cli.OCODIGO}}-{{cli.ONOMBRE}}</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-outline-info" type="button" ng-click="selectclient(data.model)">Listar</button>
          </div>
      </div>
      </form>
          <h1 class="page-header">Listado Movimientos</h1>
    	<div  class="table-responsive">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Codigo del Documento</th>
                    <th>N°</th>
                    <th>Fecha de creacion</th>
                    <th>Fecha de vencimiento</th>
                    <th>Valor</th>
                    <th>Valor neto</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                  </tr>
                </thead>
                <tr ng-repeat="mov in movimiento">
                  <td>{{mov.OCODCOMP}}</td>
                  <td>{{mov.ONUMERO}}</td>
                  <td>{{mov.OFECHA}}</td>
                  <td>{{mov.OFECVENCE}}</td>
                  <td>{{mov.OVALOR}}</td>
                  <td>{{mov.ONETO}}</td>
                  <td>{{mov.ONOMBRE}}</td>
                  <td>{{mov.ODIRECCION}}</td>
                  <td>{{mov.OTELEFONO}}</td>
                  
                </tr>
              </table>

              <!-- Modal -->
        <div class="modal fade" style="overflow-y: scroll;" id="myModalAct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="" ng-controller="controladorpedido">
                  <div class="form-group">
                        <input type="text" class="form-control" id="pcodpedido" name="pcodpedido" ng-init="pcodpedido='PV'" ng-model="pcodpedido" required="true" style="display:none;">
                        <label>Codigo Pedido:</label>
                        <input type="text" class="form-control" id="pnewcodpedido" name="pnewcodpedido" required="true" value="PV - PEDIDO DE VENTA" disabled="true">
                        <br>
                        <label>Prefijo Pedido:</label>
                        <select class="form-control" name="prepedido" id="prepedido" ng-model="prepedido">
                          <option value="00">00-SIN PREFIJO</option>
                          <option value="01">01-ENERO</option>
                          <option value="02">02-FEBRERO</option>
                          <option value="03">03-MARZO</option>
                          <option value="04">04-ABRIL</option>
                          <option value="05">05-MAYO</option>
                          <option value="06">06-JUNIO</option>
                          <option value="07">07-JULIO</option>
                          <option value="08">08-AGOSTO</option>
                          <option value="09">09-SEPTIEMBRE</option>
                          <option value="10">10-OCTUBRE</option>
                          <option value="11">11-NOVIEMBRE</option>
                          <option value="12">12-DICIEMBRE</option>
                        </select>
                        <br>
                        <label>N° del Pedido</label>
                        <input type="number" class="form-control" id="pnumero" name="pnumero" ng-model="pnumero" required="true" min="1">
                        <br>
                        <label>Fecha de Creacion:</label>
                        <input type="date" class="form-control" id="pdatecre" name="pdatecre" ng-model="pdatecre" required="true" min="2019-01-01">
                        <br>
                        <div>
                        <label>Cliente:</label>
                        <select ng-controller="controladorpcliente" class="custom-select" id="pcliente" name="pcliente" ng-model="pcliente">
                          <option ng-repeat="cli in pcli" value="{{cli.OCODIGO}}">{{cli.OCODIGO}}-{{cli.ONOMBRE}}</option>
                        </select>
                        </div>
                        <br>
                        <div>
                          <label>Vendendor:</label>
                          <select ng-controller="controladorpvendedor" class="custom-select" id="pvendedor" name="pvendedor" ng-model="pvendedor">
                            <option ng-repeat="ved in pved" value="{{ved.OCODIGO}}">{{ved.OCODIGO}}-{{ved.ONOMBRE}}</option>
                          </select>
                        </div>
                        <br>
                        <label>Forma de Pago:</label>
                        <select class="form-control" name="ppago" id="ppago" ng-model="data.model">
                          <option value="00">Contado</option>
                          <option value="CX">Credito</option>
                        </select>
                        <br>
                        <div class="form-control" ng-show="data.model=='00'">
                          Banco: <select class="form-control" name="pcontado" id="pcontado" ng-model="pcontado">
                            <option value="00">Banco Unico 00</option>
                          </select>
                        </div>
                        <div class="form-control" ng-show="data.model=='CX'">
                          Plazo Dias: <input class="form-control" type="number" name="plazodias" id="plazodias" ng-model="plazodias" min="0">

                          Fecha Vencimiento: <input class="form-control" type="date" name="pfechvence" id="pfechvence" ng-model="pfechvence" min="2019-01-01">
                        </div>

                        <hr>
                        <h4>Articulos</h4>
                    <div>
                        <div id="inputexcel" class="input-group">
                            <div id="content_file" class="input-group-prepend" flex layout="row">
                                <label flex><ng-md-icon icon="insert_drive_file"></ng-md-icon>{{name}}</label>
                                <label id="inputbutton"  class="custom-file-upload">
                                    <js-xls fd-input  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="hidden upload " onread="read" layout-align="center center" onerror="error">
                                    </js-xls>
                                </label>
                            </div>
                        </div>
                        <div id="tableContainer" class="table-responsive">
                          <table class="table-striped">
                              <tr ng-repeat="title in Elements |limitTo:1 ">
                                  <th ng-repeat="(key,val) in title " ng-if="key != 'rowIndex'">{{key}}</th>
                              </tr>
                              <tr ng-repeat="elemnt in Elements" id="{{elemnt['rowIndex']}}">
                                  <td ng-model="val" id="{{$index}}" ng-repeat="(key,val) in elemnt " ng-if="key != 'rowIndex'">{{val}}</td>
                              </tr>
                          </table>
                      </div>
                      </div>

                        
                  </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" ng-click="sendData()">Registar</button>
              </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>

                      <!-- Modal 
        <div class="modal fade" id="myModalart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="">
                  <div class="form-group">
                        
                        <label>Articulos</label>
                        <select class="form-control" name="artbodega" id="artbodega">
                          <option value="00"> Bodega Principal</option>
                        </select>
                        
                  </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>-->
      </div>
    </div>

    <!-- Modal -->
        <div class="modal fade" id="myModalAgree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recibo de Caja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form ng-controller="controladorrecibo" method="POST">
                  <div class="form-group">
                        <input type="text" class="form-control" id="rcodrecibo" name="rcodrecibo" required="true" ng-init="rcodrecibo='RC'" value="RC" ng-model="rcodrecibo" style="display: none;">
                        <label>Codigo Recibo:</label>
                        <input type="text" class="form-control" id="rnewcodrecibo" name="rnewcodrecibo" required="true" value="RC - RECIBO DE CAJA" disabled="true">
                        <br>
                        <label>Prefijo Recibo:</label>
                        <select class="form-control" name="rprerecibo" id="rprerecibo" ng-model="rprerecibo">
                          <option value="00">00-SIN PREFIJO</option>
                          <option value="01">01-ENERO</option>
                          <option value="02">02-FEBRERO</option>
                          <option value="03">03-MARZO</option>
                          <option value="04">04-ABRIL</option>
                          <option value="05">05-MAYO</option>
                          <option value="06">06-JUNIO</option>
                          <option value="07">07-JULIO</option>
                          <option value="08">08-AGOSTO</option>
                          <option value="09">09-SEPTIEMBRE</option>
                          <option value="10">10-OCTUBRE</option>
                          <option value="11">11-NOVIEMBRE</option>
                          <option value="12">12-DICIEMBRE</option>
                        </select>
                        <br>
                        <label>Fecha de Creacion:</label>
                        <input type="date" class="form-control" id="rdatecre" name="rdatecre" ng-model="rdatecre" required="true" min="2019-01-01">
                        <br>
                        <div ng-controller="controladorpcliente">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Cliente</label>
                        </div>
                        <select class="custom-select" id="rcliente" name="rcliente" ng-model="data.model" >
                          <option selected value="">Seleccione...</option>
                          <option ng-repeat="cli in pcli" value="{{cli.OCODIGO}}">{{cli.OCODIGO}}-{{cli.ONOMBRE}}</option>
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-outline-info" type="button" ng-click="selectclient(data.model)">CARGAR</button>
                        
                        </div>

                        </div>
                        <label>Documentos</label>
                        <select class="custom-select" id="rdocumento" name="rdocumento" ng-model="rdocumento">
                          <option ng-repeat="mov in movimiento" value="{{mov.OCODCOMP}},{{mov.ONUMERO}},{{mov.ONETO}},{{mov.OCODTERC}}">{{mov.OCODCOMP}}-{{mov.ONUMERO}}, Valor: {{mov.ONETO}}, {{mov.ONOMBRE}}</option>
                        </select>
                        <div>
                          <br>
                          <label>Cobrador:</label>
                          <select ng-controller="controladorpvendedor" class="custom-select" id="rvendedor" name="rvendedor" ng-model="rvendedor">
                            <option ng-repeat="ved in pved" value="{{ved.OCODIGO}}">{{ved.OCODIGO}}-{{ved.ONOMBRE}}</option>
                          </select>
                        </div>
                        <hr>
                        <label>Forma de Pago</label>
                        <select class="custom-select" id="rfpago" name="rfpago">
                          <option value="EF">EFECTIVO</option>
                          <option value="CH">CHEQUE</option>
                          <option value="TC">TARJETA DE CREDITO</option>
                        </select>
                        <br>
                        <br>
                        <label>Banco</label>
                        <select class="custom-select" id="bfpago" name="bfpago">
                          <option value="00">Banco Unico</option>
                          <option value="01">Bancolombia</option>
                        </select>
                        <br>
                        <br>
                        <label>Valor</label>
                        <input class="form-control" type="number" name="vfpago" id="vfpago" min="0">
                        <br>
                        <div>
                        <label>Tercero:</label>
                        <select ng-controller="controladorpcliente" class="custom-select" id="tfpago" name="tfpago">
                          <option ng-repeat="cli in pcli" value="{{cli.OCODIGO}}">{{cli.OCODIGO}}-{{cli.ONOMBRE}}</option>
                        </select>
                        </div>


                  </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" ng-click="sendDataRecibo()">Registrar</button>
              </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModalAct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Jugador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="actualizarjug.php">
                  <div class="form-group">
                        <label>Nombres:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required="true">
                        <label>Apellidos:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required="true" >
                        <label>Fecha de Nacimeinto:</label>
                        <input type="date" class="form-control" id="fnaci" name="fnaci" required="true">
                        <label>N° de celular:</label>
                        <input type="number" class="form-control" id="cel" name="cel" min="0" required="true">
                        <label>Ciudad:</label>
                        <input type="text" class="form-control" id="city" name="city" required="true">
                        <label>Pais:</label>
                        <input type="text" class="form-control" id="pais" name="pais" required="true">
                        <br>
                        <label>Padres:</label>
                        <div class="row">
                          <div class="col">
                            <input type="text" class="form-control input-group" id="madre" name="madre" placeholder="Madre">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control input-group" id="padre" name="padre" placeholder="Padre">
                          </div>
                        </div>
                        <br>
                        <label>Fecha de ingreso:</label>
                        <input type="date" class="form-control" id="fing" name="fing" required="true">
                        <label>Peso:</label>
                        <input type="number" class="form-control" id="peso" name="peso" placeholder="Kg" min="30" max="150" required="true">
                        <label>Estatura:</label>
                        <input type="number" class="form-control" id="estatura" name="estatura" placeholder="cm" min="130" max="220" required="true">
                  </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>

    <div class="container-fluid" style="display: none;">
	    <form>
		  <div class="form-group">
		  	<label>Nombres</label>
		    <input type="text" class="form-control">
            <label>Apellidos:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required="true" >
            <label>Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fnaci" name="fnaci" required="true">
            <label>N° de celular:</label>
            <input type="number" class="form-control" id="cel" name="cel" min="0" required="true">
            <label>Ciudad:</label>
            <input type="text" class="form-control" id="city" name="city" required="true">
            <label> Pais:</label>
            <input type="text" class="form-control" id="pais" name="pais" required="true">
            <label>Fecha de ingreso:</label>
            <input type="date" class="form-control" id="fing" name="fing" required="true">
            <label>Peso:</label>
            <input type="number" class="form-control" id="peso" name="peso" placeholder="Kg" min="30" max="150" required="true">
            <label>Estatura:</label>
            <input type="number" class="form-control" id="estatura" name="estatura" placeholder="cm" min="130" max="220" required="true">
                    

            <input type="submit" name="registrar" value="Registrar">
		  </div>
		</form>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php

	$datos = array();

	$datos = $_GET["datos"];

	$url="https://tns.net.co:726/api/Pedido?empresa=1090485981&usuario=ADMIN&password=HUSXNX&tnsapitoken=12345&codsucursal=00";


	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($datos))                                                                       
	);

	$result = curl_exec($ch);

	curl_close ($ch);

	echo $result;







  ?>
<?php 

	
	$datos = array();

	$datos = $_GET["datos"];

	$url="https://tns.net.co:726/api/Recibo?empresa=1090485981&usuario=ADMIN&password=HUSXNX&tnsapitoken=12345&codsucursal=00";


	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$datos);

	// In real life you should use something like:
	// curl_setopt($ch, CURLOPT_POSTFIELDS, 
	//          http_build_query(array('postvar1' => 'value1')));

	// Receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);

	curl_close ($ch);

	echo $server_output;







 ?>
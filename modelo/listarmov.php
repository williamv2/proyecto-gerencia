<?php

	$cliente=$_GET["cliente"];


	$url="https://tns.net.co:726/api/Tercero?empresa=1090485981&usuario=ADMIN&password=HUSXNX&tnsapitoken=12345&&codcliente=".$cliente."&codsucursal=00";

	$apijson= array();

	$apijson= file_get_contents($url);

	echo $apijson;


	



?>
<?php

	$cliente=$_POST["cliente"];

	$url="https://tns.net.co:726/api/Tercero?empresa=VALIDACION&usuario=ADMIN&password=1&tnsapitoken=12345&&codcliente=".$cliente."&codsucursal=00";

	$apijson= array();

	$apijson= file_get_contents($url);

	echo json_encode($apijson);


	



?>
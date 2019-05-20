<?php

	$url="https://tns.net.co:726/api/Tercero?empresa=1090485981&usuario=ADMIN&password=HUSXNX&tnsapitoken=12345&filtro=";

	$apijson= array();

	$apijson= file_get_contents($url);

	echo $apijson;




?>
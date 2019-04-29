<?php

	$url="https://tns.net.co:726/api/Tercero?empresa=VALIDACION&usuario=ADMIN&password=1&tnsapitoken=12345&filtro=";

	$apijson= array();

	$apijson= file_get_contents($url);

	echo $apijson;




?>
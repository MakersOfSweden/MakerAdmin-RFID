<?php

return [
	'name'    => 'RFID key service',
	'version' => '1.0',
	'url'     => 'keys',
	'gateway' => getenv('APIGATEWAY'),
	'bearer'  => getenv('BEARER'),
];
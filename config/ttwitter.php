<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => function_exists('env') ? env('TWITTER_CONSUMER_KEY', 'yECdcOh7mX8GoaGZ3UPEEer0F') : '',
	'CONSUMER_SECRET'     => function_exists('env') ? env('TWITTER_CONSUMER_SECRET', 'Q6JUNgPoWfkcQ6pmj1jGIJg8Lz6xhpczfVrMwHTWydAimniUIM') : '',
	'ACCESS_TOKEN'        => function_exists('env') ? env('TWITTER_ACCESS_TOKEN', '3148316758-tWMDtZsaWBH6wRBlQ8tqLlb0VKwYUhzqBWrt1oQ') : '',
	'ACCESS_TOKEN_SECRET' => function_exists('env') ? env('TWITTER_ACCESS_TOKEN_SECRET', 'Fkj4jaCnv1qD8drPCz4ZbLmQD91OgAX3sVCb3Kvh8Tcg0') : '',
];

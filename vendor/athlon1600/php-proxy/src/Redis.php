<?php

namespace Proxy;

class Redis {

	protected static $client;

	public function __construct(){
		// do nothing
	}
	
	public static function __callStatic($method_name, $arguments){

		$params = array(
			'scheme' => 'tcp',
			'host'   => '185.51.10.19',
			'port'   => 80,
		);
		
		if(!static::$client){
			static::$client = new \Predis\Client($params);
		}
		
		return call_user_func_array(array(static::$client, $method_name), $arguments);
	}
}


?>
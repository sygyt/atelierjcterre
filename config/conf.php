<?php
class conf{
	static private $databases = array(
		'hostname' => getenv('HOST'),
		'database' => getenv('DATABASE'),
		'login' => getenv('USERNAME'),
		'password' => getenv('PASSWORD')
	);

	static public function getLogin(){
		return self::$databases['login'];
	}

	static public function getHostname(){
		return self::$databases['hostname'];
	}

	static public function getDatabase(){
		return self::$databases['database'];
	}

	static public function getPassword(){
		return self::$databases['password'];
	}

	static private $debug = true;

	static public function getDebug(){
		return self::$debug;
	}
}

<?php
class conf{

	private $h = getenv('HOST');
	private $d = getenv('DATABASE');
	private $u = getenv('USERNAME');
	private $p = getenv('PASSWORD');
	
	static private $databases = array(
		'hostname' => $h,//getenv('HOST'),
		'database' => $d,//getenv('DATABASE'),
		'login' => $u,//getenv('USERNAME'),
		'password' => $p//getenv('PASSWORD')
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

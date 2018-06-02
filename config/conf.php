<?php
class conf{

	private $h = getenv('host');
	private $d = getenv('database');
	private $u = getenv('username');
	private $p = getenv('password');
	static private $databases = array(
		'hostname' => $h//'dz8959rne9lumkkw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com',//getenv('HOST'),
		'database' => $d//'gv1zux3l9t7ejpgr',//getenv('DATABASE'),
		'login' => $u//'forvu5bfe69cewih',//getenv('USERNAME'),
		'password' => $p//'iadnzx9gnluxwgx8'//getenv('PASSWORD')
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

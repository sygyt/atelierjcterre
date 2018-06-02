<?php
class conf{
	static private $databases = array(
		'hostname' => 'dz8959rne9lumkkw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com',//getenv('HOST'),
		'database' => 'gv1zux3l9t7ejpgr',//getenv('DATABASE'),
		'login' => 'forvu5bfe69cewih',//getenv('USERNAME'),
		'password' => 'iadnzx9gnluxwgx8'//getenv('PASSWORD')
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

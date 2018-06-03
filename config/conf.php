<?php
class conf{
	
	 $h = getenv('host');
	/* $d = getenv('database');
	 $u = getenv('username');
	 $p = getenv('password');*/
	private $databases = array(
		'hostname' => $h,//'dz8959rne9lumkkw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com',//getenv('HOST'),
		'database' => 'gv1zux3l9t7ejpgr',//getenv('DATABASE'),
		'login' => 'forvu5bfe69cewih',//getenv('USERNAME'),
		'password' => 'iadnzx9gnluxwgx8'//getenv('PASSWORD')
	);

	static public function getLogin(){
		return $this->$databases['login'];
	}

	static public function getHostname(){
		return $this->$databases['hostname'];
	}

	static public function getDatabase(){
		return $this->$databases['database'];
	}

	static public function getPassword(){
		return $this->databases['password'];
	}

	static private $debug = true;

	static public function getDebug(){
		return self::$debug;
	}
}

<?php

class controllerErreur{
	public static function erreur($message){
		
		$pageTitle = "Erreur !";
		require (File::build_path(array("view", "navbarError.php")));
		require File::build_path(array("view", "erreur.php"));
		echo $message;
		require (File::build_path(array("view", "footer.php")));
	}
}

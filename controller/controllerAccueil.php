<?php
class controllerAccueil{
  public static function readAll(){
  	$isConnect = modelArtiste::isConnected(json_decode($_COOKIE['cookie_connexion'],true));
    $pageTitle = "Accueil";
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/accueil", "accueil.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}

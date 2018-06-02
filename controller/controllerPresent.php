<?php
require_once(File::build_path(array("model", "modelPresent.php")));
require_once(File::build_path(array("controller", "controllerArtiste.php")));

class controllerPresent{
  /* Récupérer la liste des types */
  public static function readAll(){
    $isConnect = controllerArtiste::isConnected();
    $pageTitle = "Tous les artiste present";
    $tab_p = modelPresent::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "present", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function add(){
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtisteOnPage = $cookie['login'];
      $artistePresent = new modelPresent($idArtisteOnPage,$_GET['exposition']);
      $artistePresent->create();
      $pageTitle = "S'ajouter a une exposition";
      controllerArtiste::readAll();
      /*require (File::build_path(array("view", "navbar.php")));
      require (File::build_path(array("view", "exposition", "list.php")));
      require (File::build_path(array("view", "footer.php")));*/
    }
    else{
      controllerErreur::erreur("Vous devez etre un artiste pour participer a une exposition");
    }
  }



  public static function added(){
    $isConnect = controllerArtiste::isConnected();
    $idArtiste = htmlspecialchars($_POST['idArtiste']);
    $idExposition = htmlspecialchars($_POST['idExposition']);
    $ajoutPresent = new modelPresent($idArtiste, $idExposition);
    $ajoutPresent->create();
    require (File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/accueil", "accueil.php"))); 
    require (File::build_path(array("view", "footer.php")));
  }

  public static function delete(){
    $pageTitle = "...";
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtiste = $cookie['login'];
      $participation = new modelPresent($idArtiste,$_GET['exposition']);
      if(!empty($participation)){ 
        $participation->delete();
        controllerArtiste::readAll();
      }
      else{
        controllerErreur::erreur("Problème dans la suppression ");
      }
    }
    else{
      controllerErreur::erreur("Vous n'avez pas le droit d'acceder à cet page, veuillez vous connecter");
    }
  }
}

<?php
require_once(File::build_path(array("model", "modelExposition.php")));
require_once(File::build_path(array("controller", "controllerArtiste.php")));
require_once(File::build_path(array("model", "modelPresent.php")));


class controllerExposition{
  /* Récupérer la liste des types */
  public static function readAll(){
    $isConnect = controllerArtiste::isConnected();
    $idArtisteOnPage = "";
    if ($isConnect) {
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtisteOnPage = $cookie['login'];
    }
    $pageTitle = "Toutes les expositions";
    $tab_e = modelExposition::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "exposition", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function read(){
    $isConnect = controllerArtiste::isConnected();
    $idArtisteOnPage = "";
    if ($isConnect) {
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtisteOnPage = $cookie['login'];
    }
    $pageTitle = "Exposition";
    $exposition = modelExposition::read($_GET['exposition']);
    $tab_a = modelPresent::readArtisteOneExp($_GET['exposition']);
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view", "exposition", "detail.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function add(){
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect){
      $pageTitle = "Creer une exposition";
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "exposition", "create.php"))); 
      require (File::build_path(array("view", "footer.php")));
    }
    else {
       controllerErreur::erreur("Vous devez être un artiste pour ajouter des exposition");
    }
  }

  public static function added(){
    $isConnect = controllerArtiste::isConnected();
    if($isConnect){
      if(isset($_POST['expositionName']) && isset($_POST['expositionLieux']) && isset($_POST['expositionDate'])){
        $expositionName = htmlspecialchars($_POST['expositionName']);
        $expositionLieux = htmlspecialchars($_POST['expositionLieux']);
        $expositionDate = htmlspecialchars($_POST['expositionDate']);
        $cookie = json_decode($_COOKIE['cookie_connexion'],true);
        $idArtisteOnPage = $cookie['login'];  
        if(empty($_POST['expositionDescription'])){
          $expositionDescription = null;
        }
        else{
          $expositionDescription = htmlspecialchars($_POST['expositionDescription']);
        }
        echo("ici frer");
        $ajoutExposition = new modelExposition($idExposition = NULL, $expositionName, $expositionLieux, $expositionDate, $expositionDescription, $idArtisteOnPage);
        $ajoutExposition->create();
        controllerExposition::readAll();
      }
      else{
        controllerErreur::erreur("Problème dans la création de l'exposition");
      }
    }else {
     controllerErreur::erreur("Vous devez être un artiste pour ajouter des exposition");
    }
  }

  public static function update(){
    $pageTitle = "...";
    $isConnect = controllerArtiste::isConnected();
    if($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtiste = $cookie['login'];
      $exposition = modelExposition::read($_GET['exposition']);
      if ($exposition && $exposition->getIdArtiste() == $idArtiste){
        if(!empty($_POST['expositionLieux'])) {
            $exposition->setExpositionLieux(htmlspecialchars($_POST['expositionLieux']));
        }
        if(!empty($_POST['expositionDate'])){
            $exposition->setExpositionDate(htmlspecialchars($_POST['expositionDate']));
        }
        $exposition->update();
        controllerExposition::readAll();
      }else {
        controllerErreur::erreur("Vous n'avez pas le droit de modifier l'exposition");
      }
  } else {
      controllerErreur::erreur("Vous devez être connecter pour effectuer cette action");
  }
  
}

  public static function delete(){
    $pageTitle = "...";
    $isConnect = controllerArtiste::isConnected();
    if($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtiste = $cookie['login'];
      $exposition = modelExposition::read($_GET['exposition']);
      if ($exposition && $exposition->getIdArtiste() == $idArtiste){
        $exposition->delete();
        controllerExposition::readAll();
      }else {
        controllerErreur::erreur("Vous n'avez pas le droit de modifier l'exposition");
      }
  } else {
      controllerErreur::erreur("Vous devez être connecter pour effectuer cette action");
  }
}

  /* Action reservée pour un administrateur */
  public static function something(){
    if(session::is_admin()){
      $pageTitle = "...";
    }
    else{
      controllerErreur::erreur("Action non autorisée pour un client");
    }
  }
}

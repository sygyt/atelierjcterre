<?php
require_once(File::build_path(array("model", "modelOeuvre.php")));
require_once(File::build_path(array("model", "modelTypeOeuvre.php")));
require_once(File::build_path(array("model", "modelArtiste.php")));
require_once(File::build_path(array("controller", "controllerArtiste.php")));

class controllerOeuvre{
  /* Récupérer la liste des oeuvre */
  public static function readAll(){
    $isConnect = controllerArtiste::isConnected();
    $pageTitle = "Toutes les oeuvres";
    $tab_o = modelOeuvre::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "oeuvre", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function read(){
    $isConnect = controllerArtiste::isConnected();
    $pageTitle = "Une oeuvre";
    $oeuvre = modelOeuvre::read($_GET['oeuvre']);
    $oeuvreName  = $oeuvre['oeuvreName'];
    $oeuvreDescription = $oeuvre['oeuvreDescription'];
    $oeuvreDateCreation = $oeuvre['oeuvreDateCreation'];
    $oeuvrePhoto1  = $oeuvre['oeuvrePhoto1'];
    $oeuvrePhoto2  = $oeuvre['oeuvrePhoto2'];
    $oeuvrePhoto3  = $oeuvre['oeuvrePhoto3'];
    $oeuvrePhoto4  = $oeuvre['oeuvrePhoto4'];
    $idArtiste = $oeuvre['idArtiste'];
    $artiste = modelArtiste::read($idArtiste);
    $idType = $oeuvre['idType'];
    $type = modelTypeOeuvre::read($idType);
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view", "oeuvre", "detail.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function readOneArtiste(){
    $isConnect = controllerArtiste::isConnected();
    $pageTitle = "Toutes les oeuvres d'un artiste";
    $tab_o = modelOeuvre::readOneArtiste($_GET['artiste']);
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view", "oeuvre", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }


  public static function add(){
    $isConnect = controllerArtiste::isConnected();
    if($isConnect){
      $pageTitle = "Ajouter une oeuvre";
      $typeOeuvre = modelTypeOeuvre::readAll();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "oeuvre", "create.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Vous n'avez pas le droit d'acceder à cet page, veuillez vous connecter");
    }
  }

  public static function added(){
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtiste = $cookie['login'];
      if(isset($_POST['oeuvreName'])){
        $oeuvreName = htmlspecialchars($_POST['oeuvreName']);
        require_once(File::build_path(array("lib", "photo.php")));
        if(empty($_POST['oeuvreDescription'])){
          $oeuvreDescription = null;
        }
        else{
          $oeuvreDescription = htmlspecialchars($_POST['oeuvreDescription']);
        }
        if(empty($_POST['oeuvreDateCreation'])){
          $oeuvreDateCreation = null;
        }
        else{
          $oeuvreDateCreation = htmlspecialchars($_POST['oeuvreDateCreation']);
        }
        if(empty($_FILES['oeuvrePhoto1']['name'])){
          $oeuvrePhoto1 = null;
        }
        else{
          $res_tab = upload_file("oeuvre",$idArtiste.$oeuvreName,"1");
          $oeuvrePhoto1=$res_tab['msg'];
        }
        if(empty($_FILES['oeuvrePhoto2']['name'])){
          $oeuvrePhoto2 = null;
        }
        else{
          $res_tab = upload_file("oeuvre",$idArtiste.$oeuvreName,"2");
          $oeuvrePhoto2=$res_tab['msg'];        
        }
        if(empty($_FILES['oeuvrePhoto3']['name'])){
          $oeuvrePhoto3 = null;
        }
        else{
          $res_tab = upload_file("oeuvre",$idArtiste.$oeuvreName,"3");
          $oeuvrePhoto3=$res_tab['msg'];
        }
        if(empty($_FILES['oeuvrePhoto4']['name'])){
          $oeuvrePhoto4 = null;
        }
        else{
          $res_tab = upload_file("oeuvre",$idArtiste.$oeuvreName,"4");
          $oeuvrePhoto4=$res_tab['msg'];
        }
        if(empty($_POST['idType'])){
            $idType = null;
        }
        else{
          $idType = htmlspecialchars($_POST['idType']);
        }
        //1 est pour les tests
        $ajoutOeuvre = new modelOeuvre($idOeuvre = NULL, $oeuvreName, $oeuvreDescription, $oeuvreDateCreation, $oeuvrePhoto1, $oeuvrePhoto2, $oeuvrePhoto3, $oeuvrePhoto4,$idType,$idArtiste);
        $ajoutOeuvre->create();
        controllerOeuvre::readAll();

      }
      else{
        controllerErreur::erreur("Problème dans la création de l'oeuvre ");
      }
    }
    else{
      controllerErreur::erreur("Vous n'avez pas le droit d'acceder à cet page, veuillez vous connecter");
    }
  }

  public static function delete(){
    $pageTitle = "...";
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtiste = $cookie['login'];
      $oeuvre = modelOeuvre::read($_GET['oeuvre']);
      if(!empty($oeuvre) && $idArtiste = $oeuvre['idArtiste']){
        $supprimeOeuvre = new modelOeuvre($oeuvre['idOeuvre'],$oeuvre['oeuvreName'],null,null,null,null,null,null,null,$oeuvre['idArtiste']);  
        $supprimeOeuvre->delete();
        controllerArtiste::myProfile();
      }
      else{
        controllerErreur::erreur("Problème dans la suppression du type");
      }
    }
    else{
      controllerErreur::erreur("Vous n'avez pas le droit d'acceder à cet page, veuillez vous connecter");
    }
  }
}

<?php
require_once(File::build_path(array("lib","security.php")));
require_once(File::build_path(array("model", "modelArtiste.php")));
require_once(File::build_path(array("model", "modelOeuvre.php")));
class controllerArtiste{
  /* Récupérer la liste des types */
  public static function readAll(){
    $isConnect = controllerArtiste::isConnected();
    $pageTitle = "Tous les Artistes";
    $tab_a = modelArtiste::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "artiste", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function myProfile(){
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect) {
      $pageTitle = "Votre compte";
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtisteOnPage = $cookie['login'];
      $tab_o = modelOeuvre::readOneArtiste($idArtisteOnPage);
      $artiste = modelArtiste::read($idArtisteOnPage);
      require (File::build_path(array("view", "navbar.php")));
      require (File::build_path(array("view", "artiste", "profile.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Action non autorisée pour un client");
    }
    

   
  }

  public static function create(){
    $isConnect = controllerArtiste::isConnected();
    $pageTitle = "Se créer un compte";
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "artiste", "create.php")));
    require (File::build_path(array("view", "footer.php")));
  }
  //verifier si l'id est deja utiliser
  public static function created(){
    $isConnect = controllerArtiste::isConnected();
    if(isset($_POST['idArtiste']) && isset($_POST['artisteMdp']) && isset($_POST['artisteMdpBis']) && isset($_POST['artisteNom']) && isset($_POST['artistePrenom'])){
  	  if($_POST['artisteMdp'] == $_POST['artisteMdpBis']){ #vérifier si les mots de passe sont identiques
        if(!modelArtiste::alreadyExist($_POST['idArtiste'])){
          $idArtiste = htmlspecialchars($_POST['idArtiste']);
    	    $artisteMdp = security::chiffrer(htmlspecialchars($_POST['artisteMdp']));#chiffrer le mot de passe
    	    $artisteNom = $_POST['artisteNom'];
    	    $artistePrenom = $_POST['artistePrenom'];
          if (empty($_POST['artisteDescription'])){
            $artisteDescription = null;
          } else {
            $artisteDescription=$_POST['artisteDescription'];
          }
          if (empty($_FILES['artistePhoto1']['name'])){
            //si il ne fournis pas de photo on lui donne une photo de base
            $artistePhoto1 = "resources\img\artiste\image_artiste_not_found.jpg"; 
          } else {
            require_once(File::build_path(array("lib", "photo.php")));
            //la fontino upload_file upload un fichier et renvois un tableau qui contiens
            // sois vrais si l'upload a marche et une chaine de caractère qui correspond a l'adresse 
            // de la photo a mettre dans la bd
            //sois faux et un message comptenant les erreurs rencontrer pendant le traitemant du fichier
            $res_tab = upload_file("artiste",$idArtiste,"1");
            $artistePhoto1=$res_tab['msg'];
          }
          if (empty($_FILES['name']) || $res_tab['success']){
           $artiste = new modelArtiste($idArtiste, $artisteMdp, $artisteNom, $artistePrenom, $artisteDescription, $artistePhoto1);
           $artiste->create();
           controllerArtiste::readAll(); 
          }else {
            controllerErreur::erreur($res_tab['msg']);
          }
        }else{
          controllerErreur::erreur("L'identifiant choisie existe déjà.");
        }
      }else{
        controllerErreur::erreur("Les mots de passes ne coïncident pas.");
      }
    }else{
      controllerErreur::erreur("Erreur durant la création de l'utilisateur.");
    }
  }

public static function connect(){
  $isConnect = controllerArtiste::isConnected();
  $pageTitle = "Connexion";
  require (File::build_path(array("view", "navbar.php")));
  require (File::build_path(array("view", "artiste", "connect.php")));
  require (File::build_path(array("view", "footer.php")));
}
  //ajouter un fonction pour tester si le cookie a bien été créer
public static function connected(){
  $login = htmlspecialchars($_POST['idArtiste']);
  $mdp = htmlspecialchars($_POST['mdpArtiste']);
    $mdpchiffre = security::chiffrer($mdp);#chifrer le mot de passe introduit par l'utilisateur
    $rep = modelArtiste::checkPassword($login, $mdpchiffre); #vérifier s'il est dans la base de données
    if ($rep == true) {
      $size = 64;
      $strong = true;
      $bytes = openssl_random_pseudo_bytes ($size,$strong);
      $string = strlen(bin2hex($bytes));
      $token = security::chiffrer($string);
      modelArtiste::setCookie($login,$token);
      $cookie = array(
        'login' => $login,
        'token' => $token);
      setcookie('cookie_connexion', json_encode($cookie), (time() + 21600),"/");
      $isConnect = true;
      $pageTitle = "Tous les Artistes";
      $tab_a = modelArtiste::readAll();
      require (File::build_path(array("view", "navbar.php")));
      require (File::build_path(array("view", "artiste", "list.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Les identifiants et mots de passe ne correspondent pas.");
    }
  }

  public static function isConnected(){
    if (!empty($_COOKIE['cookie_connexion'])){
      $isConnect = modelArtiste::isConnected(json_decode($_COOKIE['cookie_connexion'],true));
    }
    else {
      $isConnect = false;
    }
    return $isConnect;
  }

  public static function disConnect(){
    setcookie('cookie_connexion','disconnect',30000,"/");
    $isConnect = false;
    $pageTitle = "Tous les Artistes";
    $tab_a = modelArtiste::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view", "artiste", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }


  public static function update(){
    $pageTitle = "...";
    if(isset($_POST['type'])){
      $nomType = htmlspecialchars($_POST['type']);
      $modifieType = new modelTypes($nomType);
      $modifieType->update();
      require (File::build_path(array("view", "navbar.php")));
      /* require	(File::build_path(array("view", "types", "nomDeLaVue.php"))); */
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la modification du type");
    }
  }

  public static function delete(){
    $pageTitle = "...";
    $isConnect = controllerArtiste::isConnected();
    if ($isConnect){
      $cookie = json_decode($_COOKIE['cookie_connexion'],true);
      $idArtiste = $cookie['login'];
      $artiste = modelArtiste::read($_GET['artiste']);
      if(!empty($artiste) && $idArtiste = $artiste->getIdArtiste()){ 
        $artiste->delete();
        controllerArtiste::readAll();
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



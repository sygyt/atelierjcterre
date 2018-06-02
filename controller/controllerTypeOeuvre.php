<?php/*
require_once(File::build_path(array("model", "modelTypeOeuvre.php")));

class controllerTypeOeuvre{
    public static function readAll(){
    $pageTitle = "Tous les types d'oeuvre";
    $tab_t = modelTypeOeuvre::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "typeOeuvre", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function add(){
    $pageTitle = "Ajouter un type d'oeuvre";
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "typeOeuvre", "create.php"))); 
    require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['typeLibele'])){
      $typeLibele = htmlspecialchars($_POST['typeLibele']);
      $typeDescription = htmlspecialchars($_POST['typeDescription']);
      if(empty($_POST['nbJoueursJeu'])){
        $nbJoueursJeu = null;
      }
      else{
        $nbJoueursJeu = htmlspecialchars($_POST['nbJoueursJeu']);
      }
      if(empty($_POST['dateSortieJeu'])){
        $dateSortieJeu = null;
      }
      else{
        $dateSortieJeu = htmlspecialchars($_POST['dateSortieJeu']);
      }
      if(empty($_POST['dureePartieJeu'])){
        $dureePartieJeu = null;
      }
      else{
        $dureePartieJeu = htmlspecialchars($_POST['dureePartieJeu']);
      }
      $idCategorie = htmlspecialchars($_POST['idCategorie']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      $ajoutTypeOeuvre = new modelTypeOeuvre($idTypeOeuvre = NULL, $typeLibele, $typeDescription);
      $ajoutTypeOeuvre->create();
      require (File::build_path(array("view", "navbar.php")));
      require(File::build_path(array("view/accueil", "accueil.php"))); 
      require (File::build_path(array("view", "footer.php")));

    }
    else{
      controllerErreur::erreur("Problème dans la création du jeu");
    }
  }
}
*/

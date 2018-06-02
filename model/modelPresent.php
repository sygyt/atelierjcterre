<?php
require_once(File::build_path(array("model", "model.php")));

class modelPresent{
  /** ATTRIBUTS **/
  private $idArtiste;
  private $idExposition;


  /** CONSTRUCTEUR **/
  public function __construct($idArtiste = NULL, $idExposition = NULL){
    if(!is_null($idArtiste) && !is_null($idExposition)){
      $this->idArtiste = $idArtiste;
      $this->idExposition = $idExposition;
    }
  }

  /** METHODES **/
  public static function readAll(){
    $sql = "SELECT * FROM present";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelPresent');
    return $rep->fetchAll();
  }
  
  public static function readExposition($idExposition){
    $sql = "SELECT * FROM present WHERE idExposition=:idE";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idE" => $idExposition);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelPresent');
    return $req_prep->fetchAll();
  }

 /* public static function readExpositionArtiste($idExposition,$idArtiste){
    $sql = "SELECT * FROM present WHERE idExposition=:idE AND idArtiste=:idA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idE" => $idExposition, "idA" => $idArtiste);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelPresent');
    var_dump($req_prep->fetchAll());
    return $req_prep->fetchAll();
  } */

  public static function readArtisteOneExp($idExposition){
    $sql = "SELECT artiste.idArtiste, artiste.artisteNom, artiste.artistePrenom FROM present JOIN artiste ON present.idArtiste = artiste.idArtiste WHERE present.idExposition=:idE";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idE" => $idExposition);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelArtiste');
    return $req_prep->fetchAll();
  }  

  public function create(){
    $sql = "INSERT INTO present(idArtiste, idExposition) VALUES (:idA, :idE)";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $this->idArtiste, "idE" => $this->idExposition);
    $req_prep->execute($values);
  }

  public function update(){
    $sql = 'UPDATE types SET nomType = :nomT';
    $req_prep = model::$pdo->prepare($sql);
    $values = array("nomT" => $this->nomType);
    $req_prep->execute($values);
  }

  public function delete(){
    $sql = "DELETE FROM present WHERE idArtiste = :idA AND idExposition = :idE";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $this->idArtiste, "idE" => $this->idExposition);
    $req_prep->execute($values);
  }
}

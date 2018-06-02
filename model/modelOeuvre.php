<?php
require_once(File::build_path(array("model", "model.php")));

class modelOeuvre{
  /** ATTRIBUTS **/
  private $idOeuvre;
  private $oeuvreName;
  private $oeuvreDescription;
  private $oeuvreDateCreation;
  private $oeuvrePhoto1;
  private $oeuvrePhoto2;
  private $oeuvrePhoto3;
  private $oeuvrePhoto4;
  private $idType;
  private $idArtiste;

  /** CONSTRUCTEUR **/
  public function __construct($idOeuvre = NULL, $oeuvreName = NULL, $oeuvreDescription = NULL, $oeuvreDateCreation = NULL, $oeuvrePhoto1 = NULL, $oeuvrePhoto2 = NULL, $oeuvrePhoto3 = NULL, $oeuvrePhoto4 = NULL, $idType = NULL, $idArtiste = NULL ){
    if(!is_null($oeuvreName) && !is_null($idArtiste)){
      $this->idOeuvre = $idOeuvre;
      $this->oeuvreName = $oeuvreName;
      $this->oeuvreDescription = $oeuvreDescription;
      $this->oeuvreDateCreation = $oeuvreDateCreation;
      $this->oeuvrePhoto1 = $oeuvrePhoto1;
      $this->oeuvrePhoto2 = $oeuvrePhoto2;
      $this->oeuvrePhoto3 = $oeuvrePhoto3;
      $this->oeuvrePhoto4 = $oeuvrePhoto4;
      $this->idType = $idType;
      $this->idArtiste = $idArtiste;
    }
  }

  /** GETTERS **/
  public function getIdOeuvre(){
    return $this->idOeuvre;
  }

  public function getOeuvreName(){
    return $this->oeuvreName;
  }

  public function getOeuvreDescription(){
    return $this->oeuvreDescription;
  }

  public function getOeuvreDateCreation(){
    return $this->oeuvreDateCreation;
  }

  public function getOeuvrePhoto1(){
    return $this->oeuvrePhoto1;
  }

  public function getOeuvrePhoto2(){
    return $this->oeuvrePhoto2;
  }

  public function getOeuvrePhoto3(){
    return $this->oeuvrePhoto3;
  }

  public function getOeuvrePhoto4(){
    return $this->oeuvrePhoto4;
  }

  public function getIdType(){
    return $this->idType;
  }

  public function getIdArtiste(){
    return $this->idArtiste;
  }

  /** METHODES **/
  public static function readAll(){
    $sql = "SELECT * FROM oeuvre";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelOeuvre');
    return $rep->fetchAll();
  }

  public static function read($idOeuvre){
    $sql = "SELECT * FROM oeuvre WHERE :idO=idOeuvre";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idO" => $idOeuvre);
    $req_prep->execute($values);
    $rep = $req_prep->fetch();
    return $rep;
  }

  public static function readOneArtiste($idArtiste){
    $sql = "SELECT * FROM oeuvre WHERE :idA=idArtiste";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $idArtiste);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelOeuvre');
    return $req_prep->fetchAll();
  }

  public function create(){
    $sql = "INSERT INTO oeuvre(idOeuvre, oeuvreName, oeuvreDescription, oeuvreDateCreation, oeuvrePhoto1, oeuvrePhoto2, oeuvrePhoto3, oeuvrePhoto4, idType, idArtiste) VALUES (:idO, :nomO, :descrO, :dateO, :Oph1, :Oph2, :Oph3, :Oph4, :idT, :idA)";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idO" => NULL, "nomO" => $this->oeuvreName, "descrO" => $this->oeuvreDescription, "dateO" => $this->oeuvreDateCreation, "Oph1" => $this->oeuvrePhoto1, "Oph2" => $this->oeuvrePhoto2, "Oph3" => $this->oeuvrePhoto3, "Oph4" => $this->oeuvrePhoto4, "idT" => $this->idType, "idA" => $this->idArtiste);
    $req_prep->execute($values);
  }

    public function delete(){
      $sql = "DELETE FROM oeuvre WHERE idOeuvre = :idO";
      $req_prep = model::$pdo->prepare($sql);
      $values = array("idO" => $this->idOeuvre);
      $req_prep->execute($values);
    }  
}
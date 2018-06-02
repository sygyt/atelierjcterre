<?php
require_once(File::build_path(array("model", "model.php")));

class modelArtiste{
  /** ATTRIBUTS **/
  private $idArtiste;
  private $artisteMdp;
  private $artisteNom;
  private $artistePrenom;
  private $artisteDescription;
  private $artistePhoto1;
  private $nbOeuvre;

  /** CONSTRUCTEUR **/
  public function __construct($idArtiste = NULL, $artisteMdp = NULL, $artisteNom = NUll, $artistePrenom = NULL, $artisteDescription = NULL, $artistePhoto1 = NULL, $nbOeuvre = NULL){
    if(!is_null($idArtiste) && !is_null($artisteMdp) && !is_null($artisteNom) && !is_null($artistePrenom)){
      $this->idArtiste = $idArtiste;
      $this->artisteMdp = $artisteMdp;
      $this->artisteNom = $artisteNom;
      $this->artistePrenom = $artistePrenom;
      $this->artisteDescription = $artisteDescription;
      $this->artistePhoto1 = $artistePhoto1;
      $this->nbOeuvre = $nbOeuvre; 
    }
  }

  /** GETTERS **/
  public function getIdArtiste(){
    return $this->idArtiste;
  }

  public function getArtisteMdp(){
    return $this->artisteMdp;
  }

  public function getArtisteNom(){
    return $this->artisteNom;
  }

  public function getArtistePrenom(){
    return $this->artistePrenom;
  }

  public function getArtisteDescription(){
    return $this->artisteDescription;
  }

  public function getArtistePhoto1(){
    return $this->artistePhoto1;
  }

  public function getNbOeuvre(){
    return $this->nbOeuvre;
  }

  /** METHODES **/
  public static function readAll(){
    $sql = "SELECT * FROM artiste";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelArtiste');
    return $rep->fetchAll();
  }

  public static function read($idArtiste){
    $sql = "SELECT * FROM artiste WHERE idArtiste=:idA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $idArtiste);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelArtiste');
    return $req_prep->fetch();
  }

  public function create(){
    $sql = "INSERT INTO artiste(idArtiste, artisteMdp, artisteNom, artistePrenom, artisteDescription, artistePhoto1) VALUES (:idA, :mdpA, :nomA, :prnA, :dscrA, :phtA)";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $this->idArtiste, "mdpA" => $this->artisteMdp, "nomA" => $this->artisteNom, "prnA" => $this->artistePrenom, "dscrA" => $this->artisteDescription, "phtA" => $this->artistePhoto1);
    $req_prep->execute($values);
  }

  public static function checkPassword($login,$mot_de_passe_chiffre){
    $sql = "SELECT * FROM artiste WHERE idArtiste = :idA AND artisteMdp = :mdpA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $login, "mdpA" => $mot_de_passe_chiffre);
    $req_prep->execute($values);
    $rep = $req_prep->fetch();
    if(empty($rep)){
      return false;
    }
    else{
      return true;
    }
  }

  public static function setCookie($login, $token){
    $sql = "UPDATE artiste SET token = :T WHERE idArtiste = :idA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("T" => $token, "idA" => $login);
    $req_prep->execute($values);
  }


  public static function isConnected($cookie){
    $sql = "SELECT token FROM artiste WHERE idArtiste =:idA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $cookie['login']);
    $req_prep->execute($values);
    $rep = $req_prep->fetch();
    if (!empty($rep) && ($rep['token'] = $cookie['token'])) {
      $res = true;
    }
    else {
      $res = false;
    }
    return $res;
  }

  public function update(){
    $sql = 'UPDATE types SET nomType = :nomT';
    $req_prep = model::$pdo->prepare($sql);
    $values = array("nomT" => $this->nomType);
    $req_prep->execute($values);
  }

  public function delete(){
    $sql = "DELETE FROM artiste WHERE idArtiste=:idA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $this->idArtiste);
    $req_prep->execute($values);
  }

  public static function alreadyExist($idArtiste){
    $sql = "SELECT * FROM artiste WHERE idArtiste = :idA";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idA" => $idArtiste);
    $req_prep->execute($values);
    $rep = $req_prep->fetch();
    if(empty($rep)){
      return false;
    }
    else{
      return true;
    }
  }
}

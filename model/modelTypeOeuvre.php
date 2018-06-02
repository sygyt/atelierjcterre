<?php
require_once(File::build_path(array("model", "model.php")));

class modelTypeOeuvre{
  /** ATTRIBUTS **/
  private $idType;
  private $typeLibele;
  private $typeDescription;
  /*private $something;*/

  /** CONSTRUCTEUR **/
  public function __construct($idType = NULL, $typeLibele = NULL, $typeDescription = null){
    if(!is_null($typeLibele)/* && !is_null($something)*/){
      $this->idType = $idType;
      $this->typeLibele = $typeLibele;
      $this->typeDescription = $typeDescription;
    }
  }

  /** GETTERS **/
  public function getIdType(){
    return $this->idType;
  }

  public function getTypeLibele(){
    return $this->typeLibele;
  }

  public function getTypeDescription(){
    return $this->typeDescription;
  }

  /** METHODES **/
  public static function readAll(){
    $sql = "SELECT * FROM typeoeuvre";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelTypeOeuvre');
    return $rep->fetchAll();
  }

  public static function read($idType){
    $sql = "SELECT * FROM typeOeuvre WHERE idType=:idT";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idT" => $idType);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelTypeOeuvre');
    return $req_prep->fetch();
  }
}

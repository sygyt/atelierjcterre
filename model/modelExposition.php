<?php
require_once(File::build_path(array("model", "model.php")));

class modelExposition{
  /** ATTRIBUTS **/
  private $idExposition;
  private $expositionName;
  private $expositionLieux;
  private $expositionDate;
  private $expositionDescription;
  private $idArtiste;

  /** CONSTRUCTEUR **/
  public function __construct($idExposition = NULL, $expositionName = NULL, $expositionLieux = NULL, $expositionDate = NULL, $expositionDescription = NULL, $idArtiste = NULL){
    if(!is_null($expositionName) && !is_null($expositionLieux) && !is_null($expositionDate) && !is_null($idArtiste)){
      $this->idExposition = $idExposition;
      $this->expositionName = $expositionName;
      $this->expositionLieux = $expositionLieux;
      $this->expositionDate = $expositionDate;
      $this->expositionDescription = $expositionDescription;
      $this->idArtiste = $idArtiste;
    }
  }

  /** GETTERS **/
  public function getIdExposition(){
    return $this->idExposition;
  }

  public function getExpositionName(){
    return $this->expositionName;
  }

  public function getExpositionLieux(){
    return $this->expositionLieux;
  }

  public function getExpositionDate(){
    return $this->expositionDate; 
  }

  public function getExpositionDescription(){
    return $this->expositionDescription;
  }

  public function getIdArtiste(){
    return $this->idArtiste;
  }

  /** SETTERS **/
  public function setExpositionDate($date){
    $this->expositionDate = $date;
  }

  public function setExpositionLieux($lieux){
    $this->expositionLieux = $lieux;
  }

  /** METHODES **/
  public static function readAll(){
    $sql = "SELECT * FROM exposition";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelExposition');
    return $rep->fetchAll();
  }

  public static function read($idExposition){
    $sql = "SELECT * FROM exposition WHERE idExposition=:idE";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idE" => $idExposition);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelExposition');
    return $req_prep->fetch();
  }


  public function create(){
    $sql = "INSERT INTO exposition(idExposition, expositionName, expositionLieux, expositionDate, expositionDescription, idArtiste) VALUES (:idE, :nomE, :lieuxE, :dateE, :dscrE, :idA)";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idE" => NULL, "nomE" => $this->expositionName, "lieuxE" => $this->expositionLieux, "dateE" => $this->expositionDate, "dscrE" => $this->expositionDescription, "idA" => $this->idArtiste);
    $req_prep->execute($values);
    echo($this->idArtiste);
    var_dump($values);
  }

  public function update(){
    $sql = 'UPDATE exposition SET expositionLieux = :expL, expositionDate = :expD WHERE idExposition = :idE';
    $req_prep = model::$pdo->prepare($sql);
    $values = array("expL" => $this->expositionLieux, "expD" => $this->expositionDate, "idE" => $this->idExposition);
    $req_prep->execute($values);
  }

  public function delete(){
    $sql = "DELETE FROM exposition WHERE idExposition = :idE";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idE" => $this->idExposition);
    $req_prep->execute($values);
  }
}

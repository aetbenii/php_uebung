<?php

class Person{
    use ActiveRecordable, Persistable;

    private int $id = 0;
    private String $vorname;
    private String $nachname;

    protected static $table = 'person';

    function getId():int{
        return $this->id;
    }

    function setVorname(String $vn){
        $this->vorname = $vn;
    }

    function getVorname(){
        return $this->vorname;
    }

    function setNachname(String $nn){
        $this->nachname = $nn;
    }

    function getNachname(){
        return $this->nachname;
    }

    public function getAdresse(){
        return Adresse::findeNachPerson($this->getId());
    }

    public static function findeAlle(){
        $sql = 'SELECT * FROM person';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetchAll();
    }

    public static function findePerson(int $id){
        $sql = "SELECT * FROM person WHERE id=".$id;
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetch();
    }

    //für das refactoren
      
    //////////////

    /*
    public static function findeVornamen(String $vornamen){
        $sql = "SELECT vorname, nachname FROM person WHERE vorname = '".$vornamen."'";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetchAll();
    }
    */
    public static function findeVornamen(string $vornamen){
        $sql = "SELECT vorname, nachname FROM person WHERE vorname=:vorname";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array('vorname' => $vornamen));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetchAll();
    }

    /*
    public static function findeNachnamen(String $nachnamen){
        $sql = "SELECT vorname, nachname FROM person WHERE nachname = '".$nachnamen."'";
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetchAll();
    }
    */
    //Funktion als Prepared Statement
    public static function findeNachnamen(string $nachnamen):array{
        $sql = "SELECT vorname, nachname FROM person WHERE nachname =?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($nachnamen));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetchAll();
    }

    private function _insert(){
        $sql = 'INSERT INTO person(vorname, nachname) VALUES (:vorname, :nachname)';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));
        $this->id = DB::getDB()->lastInsertId();
    }

    private function _update(){
        $sql = "UPDATE person SET vorname=:vorname, nachname=:nachname WHERE id=:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray());
    }

    //Bei der löschen methode wird die id von der klasse hergenommen (idperson hier drinne)

    public function loesche(){
        $sql = "DELETE FROM person WHERE id=?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($this->getId()));
        $this->id=0;

    } 

    //\/\/\/\/\/\/\/\/\/\/\/\/\/\//
    //          Auto             //

    public function findeAuto(){
        return Auto::findeNachPerson($this->getId());
    }

    public static function findeNachAuto(int $autoid){
        $sql = "SELECT * FROM person 
        JOIN person_auto on person.id = person_auto.person_id where id = ?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($autoid));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Person');
        return $abfrage->fetchAll();
    }    

    public function addAuto(Auto $auto){
        $sql = "INSERT INTO person_auto(person_id, auto_id) VALUES(?,?)";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($this->getId(), $auto->getId()));
    }

    public function loescheAuto(Auto $auto){
        $sql = "DELETE FROM person_auto WHERE auto_id=?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($auto->getId()));
    }

    public function __toString()
    {
     return "ID: ".$this->getID().",<br /> Vorname:".$this->getVorname().",<br /> Nachname:".$this->getNachname();   
    }
}
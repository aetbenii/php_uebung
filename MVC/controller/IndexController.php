<?php

class IndexController extends AbstractBase{

// Alle Seminartermine auslesen
public function allePAktion(){
  $this->addContext("personen", Person::findeAlle());
}

public function autoAktion(){
  $this->addContext("autos", Auto::findeNachPerson($_GET['id']));
  $this->addContext("User", Person::findePerson($_GET['id']));
}


public function firstAktion(){

}

public function insertPersonAktion(){
  
}

public function editPersonAktion(){
  $this->addContext("person", Person::findePerson($_GET['id']));
}

}


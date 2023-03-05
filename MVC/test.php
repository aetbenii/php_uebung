<?php
if($_POST['vorname'] ?? null){
    $p = new Person();
    $p->setVorname($_POST['vorname']);
    $p->setNachname($_POST['nachname']);
    $p->speichere();
    var_dump($p);
    #header("location:index.php?aktion=alleP");
}
<?php

if($_POST['vorname'] ?? null){
    $p = new Person();
    $p->setVorname($_POST['vorname']);
    $p->setNachname($_POST['nachname']);
    $p->speichere();
    
    header("location:index.php?aktion=alleP");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERSONEN DATEN KLAUEN UND IN DIE DATENBANK EINFÜGEN
    </title>
</head>
<body>
    <form method="post" action="index.php?aktion=insertPerson">
        <input type="text" value="" name="vorname" id="vorname" placeholder="vorname" required>
        <input type="text" value="" name="nachname" id="nachname" placeholder="nachname" required>
        <input type="submit" value="enter">
    </form>
</body>
</html>
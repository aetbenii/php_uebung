<?php

if($_POST['vorname'] ?? null){
    $person->setVorname($_POST['vorname']);
    $person->setNachname($_POST['nachname']);
    $person->speichere();
    header("location:index.php?aktion=alleP");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="index.php?aktion=editPerson&id=<?= $person->getId()?>">
        <input type="text" value="<?= $person->getVorname()?>" name="vorname" id="vorname" required>
        <input type="text" value="<?= $person->getNachname()?>" name="nachname" id="nachname" required>
        <input type="submit" value="enter">
    </form>
</body>
</html>
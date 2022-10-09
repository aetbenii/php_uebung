<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $gewicht = 95;
        $groesse = 187; 

        $vorname = 'Benjamin';
        $nachname = 'Düring';
        $geschlecht = 'Herr';

        $zahlen = array("5","3","6","4","1");

        bmi($groesse, $gewicht);

    ?>
        </br>
        <?=begruessung($vorname, $nachname, $geschlecht);?>
        </br>
        <?=bubblesort($zahlen)?>
</body>
</html>
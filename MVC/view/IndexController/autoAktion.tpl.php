<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Autos</title>
    </head>
    <body>
        <p>Autos von <?= $User->getVorname()  ?></p>
        <table>
            <tr><th>Marke</th><th>Modell</th><th>Kennzeichen</th> <th>Löschen<th></tr>
            <?php foreach ($autos as $auto) { ?>
            <tr>
                <td><?php echo $auto->getMarke()?></td>
                <td><?php echo $auto->getModell()?></td>
                <td><?php echo $auto->getKennzeichen()?></td>
                <td><a href="index.php?aktion=delauto&pid=<?=$User->getid()?>&aid=<?=$auto->getid()?>">Löschen</a></td>
            </tr>
            <?php } ?>
        </table>
            
    </body>
</html>

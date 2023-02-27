<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seminartermine</title>
    </head>
    <body>
        <table>
            <tr><th>Vorame</th><th>Nachname</th><th>Auto</th></tr>
            <?php foreach ($personen as $person) { ?>
            <tr>
                <td><?php echo $person->getVorname()?></td>
                <td><?php echo $person->getNachname()?></td>
                <td><a href="index.php?aktion=auto&id=<?= $person->getid()?>">Auto</a><td>
            </tr>
            <?php } ?>
        </table>
            
    </body>
</html>

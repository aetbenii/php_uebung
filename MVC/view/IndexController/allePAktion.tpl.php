<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seminartermine</title>
    </head>
    <body>
        
        <table border=1>
            <tr><th>Vorame</th><th>Nachname</th><th>Auto</th><th>Edit</th></tr>
            <?php foreach ($personen as $person) { ?>
            <tr>
                <td><?php echo $person->getVorname()?></td>
                <td><?php echo $person->getNachname()?></td>
                <td><a href="index.php?aktion=auto&id=<?= $person->getid()?>">Auto</a></td>
                <td><a href="index.php?aktion=editPerson&id=<?= $person->getid()?>">  X  </td>
            </tr>
            <?php } ?>
        </table>
            
    </body>
</html>

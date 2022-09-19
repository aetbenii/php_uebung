<!DOCTYPE html>
<html lang="en">
<style>
table, th, td {
  border:1px solid black;
  
}
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: rgb(128, 0, 128); color: white; font-family: Verdana;">
     <!-- Array ausgabe als Tabelle ohne echos -->
    <div class="foreach_uebung">
        <table>
                <tr>
                    <th>Nr.</th>
                    <th>Name</th>
                </tr>
                <?php foreach ($info4 as $index => $name) {?>
                <tr>
                    <td><?= ++$index?></td>
                    <td><?= $name ?> </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
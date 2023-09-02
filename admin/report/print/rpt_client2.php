<?php

include("../../database/connect.php");
$re = $db->prepare("SELECT * FROM tblcustomer");
$re->execute();
$cl = $re->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENT</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body onload="window. print()"> 
    <h2 class="text-center">LISTE DE CLIENTS</h2>
    <table class="table table-stripped">
        <tr>
            <th>#</th>
            <th>Date creation compte</th>
            <th>Nom complet</th>
            <th>Adresse</th>
            <th>Sexe</th>
            <th>Telephone</th>
        </tr>
        <?php foreach($cl as $c): ?>
        <tr>
            <td><?=$c['CUSTOMERID']?></td>
            <td><?=$c['DATEJOIN']?></td>
            <td><?=$c['FNAME']?> <?$c['LNAME']?></td>
            <td><?=$c['CITYADD']?></td>
            <td><?=$c['GENDER']?></td>
            <td><?=$c['PHONE']?></td> 
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
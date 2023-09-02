<?php

include("../../database/connect.php");
$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` ";
$re = $db->prepare($query);

$re->execute();
$cl = $re->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUIT</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body onload="window. print()"> 
    <h2 class="text-center">LISTE DE PRODUITS</h2>
    <table class="table table-stripped">
        <tr>
            <th>#</th>
            <th>Produit</th>
            <th>Description</th>
            <th>Prix</th>
			<th>Remise%</th>  
			<th>Prix de remise </th>  
			<th>Quantite</th>  
        </tr>
        <?php $id=0; foreach($cl as $c): $id++;?>
        <tr>
            <td><?=$id?></td>
            <td><?=$c['PROID']?></td>
            <td><?=$c['PRODESC']?> </td>
            <td><?=number_format($c['PROPRICE'],2)?> $</td>
            <td><?=number_format($c['PRODISCOUNT'],0)?> $</td>
            <td><?=number_format($c['PRODISPRICE'],2)?> $</td> 
            <td><?=$c['PROQTY']?></td>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
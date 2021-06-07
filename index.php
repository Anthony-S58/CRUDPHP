<?php

require_once('connexion.php');

$sql='SELECT * from crud';
$query = $db->prepare($sql);
$query->execute(); 
$result = $query->fetchAll(PDO::FETCH_ASSOC); 

// var_dump($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projet</title>
</head>
<body>

<table>

    <thead>

        <th>PROJET</th>
        <th>IMAGE</th>
        <th>DESCRIPTION</th>
    
    </thead>

    <tbody>

        <?php
        foreach ($result as $projet) {
        ?>
            <tr>
            
                <td><?php echo $projet['Nom'];?></td>    
                <td><?= $projet['Image'];?></td>
                <td><?= $projet['Description'];?></td>
                <td><a href="supprimer.php?ID=<?= $projet['ID'];?>">Supprimer</a> </td>
                <td><a href="modifier.php?ID=<?= $projet['ID'];?>">modifier</a> </td>


            </tr>

        <?php }
        ?>

    </tbody>



</table>
    
</body>
</html>
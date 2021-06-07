<?php

require_once('connexion.php');

if ($_POST) {

    if(isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['image']) && !empty($_POST['image'])
    && isset($_POST['description']) && !empty($_POST['description'])) {

        $nom = $_POST['nom'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        
        $sql = "INSERT INTO crud(Nom, Image, Description) VALUES (:nom, :image, :description)";
        $query = $db->prepare($sql);
        $query->bindValue(':nom', $nom);
        $query->bindValue(':image', $image);
        $query->bindValue(':description', $description);

        $query->execute();

    }
 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Testcrud
    </title>
</head>
<body>

<h1>TEST CRUD  </h1>

<form action="" method="POST">

    <div class="form-group">

        <input name="nom" type="text" placeholder="Nom du projet"></input required>
        <br>


        <input name="image" type="File" placeholder="Image"></input required>
        <br>


        <input class="descr" name="description" placeholder="Description"></input required>
        <br>

        <input type="submit" value="valider">

    </div>

</form>

<?php


?>
    
</body>
</html>
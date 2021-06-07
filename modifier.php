<?php
// recuperation de la connexion à la base de données
require_once('connexion.php');

// methode post
if ($_POST) {

    if(isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['image']) && !empty($_POST['image'])
    && isset($_POST['description']) && !empty($_POST['description'])) {

        $id = strip_tags($_GET['ID']);
        $nom = strip_tags($_POST['nom']);
        $image = strip_tags($_POST['image']);
        $description = strip_tags($_POST['description']);

        // update
        $sql = "UPDATE crud SET Nom=:nom, Image=:image, Description=:description WHERE ID=:id";
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);

        $query->execute();

        header("Location: index.php");

    }else {
        echo 'remplissez tous les champs';
    }}
// récupération des données du projet
if(isset($_GET['ID'])&& !empty($_GET['ID'])) {

    $id = strip_tags($_GET['ID']);  //fonction qui permet d'enlever tous les tags html
    // var_dump($id); //verification que l'on récupère bien l'ID

    $sql = "SELECT * FROM crud WHERE ID= :id";  //requête préparée
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $projet = $query->fetch();
    // on verifie si le projet existe
    if(!$projet){
        header("Location: index.php");
    }
    }else {
    header("Location: index.php");
    }



?>


<!DOCTYPE html>
<html lang="fr">
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

        <input name="nom" type="text" value="<?php echo $projet['Nom']?>"></input required>
        <br>


        <input name="image" type="File" value="<?php echo $projet['Image']?>"></input>
        <br>


        <input class="descr" name="description" value="<?php echo $projet['Description']?>"></input required>
        <br>

        <input type="submit" value="Modifier">

    </div>

</form>

<?php


?>
    
</body>
</html>
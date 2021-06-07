<?php

require_once('connexion.php');

if(isset($_GET['ID'])&& !empty($_GET['ID'])){
    
    $id = strip_tags($_GET['ID']);  //fonction qui permet d'enlever tous les tags html
    var_dump($id); //verification que l'on récupère bien l'ID

    $sql = "SELECT ID FROM crud WHERE ID= :id";  //requête préparée
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $sql = "DELETE FROM crud WHERE ID = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();


    header("location:index.php");


}
<?php

// variables pour la connexion

$servername='localhost';
$dbname='testcrud';
$username='root';
$password='';

// connexion à la base de données

try {

    $db=new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PODException $e) {
    echo " connexion failed: " . $e->getMessage();
}
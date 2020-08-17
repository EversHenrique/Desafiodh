<?php

$host = "mysql:host=localhost;dbname=desafiohenrique;port3306";
$user = "root";
$pass = "";

try {
    $db = new PDO($host, $user, $pass);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
    $e -> getMenssage();
    exit;
}

?>
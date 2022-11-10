<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tp_ecole";
try {
  $conn = new PDO("mysql:host=$servername;dbname=tp_ecole", $username, $password);
  
    
} catch(PDOException $e) {
  echo " Erreur de connexion" . $e->getMessage();
}
?>


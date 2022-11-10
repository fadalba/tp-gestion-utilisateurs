<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
  <title>Liste des utilisateurs</title>
</head>
<body>


 <div class="container">
 <thead>
   <table class="table table-striped table-hover">
        <h2><p align=center>Liste des Utilisateurs</p></h2>
       
        <tr>
        <th>Id</th>
        <th>prenom</th>
        <th>nom</th>
        <th>email</th>
        <th>matricule</th>
        <th>role</th>
        <th>action</th>
      </tr>
</table>
</thead>
</div>

<?php
require_once("bd.php");
$req=$conn->query("select * from user");
while($affiche=$req-->fetch()){?>

<tr>
  <td><?php echo $affiche['Id'];?> </td>
  <td><?php echo $affiche['prenom'];?> </td>
  <td><?php echo $affiche['nom'];?> </td>
  <td><?php echo $affiche['email'];?> </td>
  <td><?php echo $affiche['matricule'];?> </td>
  <td><?php echo $affiche['role'];?> </td>
  <td><?php echo $affiche['action'];?> </td>
<td>
  <a href="delete.php?Id=<?php echo $affiche['Id']?"> Archiver</a>
  <a href="modifier.php?['Id']=<?php echo $affiche['Id']?"> Modifier </a>
  </tr>
?>
</html>
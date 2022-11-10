<?php include 'connect_db.php';?>

<?php 
 session_start();

?>
<?php
     $sql = "SELECT * FROM user";
     $stmt = $conn->query($sql);
?>
<?php
     $id = $_SESSION['identifiant'];
     $sql = "SELECT * FROM user WHERE Id=$id";
     $stmt_ = $conn->prepare($sql);
     $stmt_->execute();
     $affich = $stmt_ ->fetch();
    
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../style/employe.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Interface admin</title>
</head>

<body>
   
</body>
</html>


<div class="container">

<nav class="navbar bg-primary">
  <div class="container-fluid">
  <!--  *****************affichage photo et matricule sur la partie nav ******************************** -->
  <a class="navbar-brand"style="color:white";><?= $affich ['prenom']." ".$affich ['nom'];echo '<img src="data:image;base64,'.base64_encode($_SESSION["photo"]).'" style="width: 100px;height:100px;border-radius:50%;"/>'; ?> </a>
    <a class="navbar-brand"style="color:white";><?= $affich ['matricule']; ?> </a>
     
    <h1 style="color:white";> Espace utilisateur </h1><br/>
    
   <!--  **********************************************Déconnexion********************************************************* -->
   <ul class=form> 
   <form class="d-flex" role="search">
    <button type="button" class="btn btn-white"></button><a href="deconnexion.php" style="color:white;text-decoration:none;"><span class="material-symbols-outlined">logout

</span></a></button>

    </form>
    <div>
      
    </div>    
    </ul>
  </div>
</nav><br>

    <div class="row">
        <div class="col-4">
                <!-- <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Utilisateurs</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Archives</a>
                       
                </div> -->
        </div>
        <div class="container"></div>
        <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                          <!-- coté Back-End -->
                          
                          <table class="table" >
                                <thead>
                                <tr class="bg-primary ">
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email </th>
                                <th scope="col">Matricule </th>
                                <th scope="col">Date_inscription </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                      
                                       
                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
?>
                                        <tr>
                                        <th><?php  echo htmlspecialchars($row['nom']); ?></th>
                                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['matricule']); ?></td>
                                        <td><?php echo htmlspecialchars($row['date_inscrit']); ?></td>
                                        <!-- <td><div class="action">
                                        <button type="button" class="btn btn-light"><span class="material-symbols-outlined">edit_square
                                        </span></button><a href="modifier.php" style="color:white;text-decoration:none;">
                                        <button type="button" class="btn btn-light"><span class="material-symbols-outlined">delete
                                        </span></button><a href="delete.php" style="color:white;text-decoration:none;">
                                        <button type="button" class="btn btn-light"><span class="material-symbols-outlined">sync_alt
                                        </span></button><a href="switch.php" style="color:white;text-decoration:none;">
                                        </td> -->
                                        </tr> 
                                <?php endwhile;?>
                              
                                </div>  
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>







<?php include 'connect_db.php';?>


<?php 
 session_start();

?>
<?php
     $sql = "SELECT * FROM user WHERE état=0";
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
   



<div class="container">

<nav class="navbar bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand"style="color:white";><?= $affich ['prenom']." ".$affich ['nom'];echo '<img src="data:image;base64,'.base64_encode($_SESSION["photo"]).'" style="width: 100px;height:100px;border-radius:50%;"/>'; ?> </a>
  <a class="navbar-brand"style="color:white";><?= $affich ['matricule']; ?> </a>
  <h1> Espace Archives</h1>
   <!--  ***********************************************Déconnxion************************************************************** -->
    <ul class=form> 
   <form class="d-flex" role="search">
    <button type="button" class="btn btn-white"></button><a href="deconnexion.php" style="color:white;text-decoration:none;"><span class="material-symbols-outlined">logout

</span></a></button>

    </form>
    <div>
      
    </div>    
    </ul>
  </div>
</nav>
<!--  ***********************************************Déconnxion************************************************************** -->
<br>
    <div class="row">
        <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                        <a class="nav-link active" aria-current="page" href="espace_admin.php">Utilisateurs</a>
                        <a class="nav-link" href="liste_archive.php">Archives</a>
                     
                </div>
        </div>
        <div class="col-8">
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
                                <th scope="col">Rôle </th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
</body>
</html>
                                <?php
                                      
                                       
                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
?>
                                        <tr>
                                        <th><?php  echo htmlspecialchars($row['nom']); ?></th>
                                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['matricule']); ?></td>
                                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                                        <td><div class="action">
                                        <a href="restaure.php?Id=<?=$row['Id']?> "onclick="return confirm('Voulez vous vraiment désarchiver cet utilisateur');"class="btn btn-white " aria-current="page"><span class="material-symbols-outlined">ios_share
                                        </span>
                                        </td>
                                        </tr> 
                                <?php endwhile;?>
                          
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                       <!-- coté Back-End -->
                                      
                                      
                                
                                        
                        </div>
                        
    
                </div>
        </div>
    </div>
</div>


<!-- partie recherche -->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>







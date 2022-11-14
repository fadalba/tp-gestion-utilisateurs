<?php 
 session_start();

?>
<?php include 'connect_db.php';?>



<?php
     $id = $_SESSION['identifiant'];
     $sql = "SELECT * FROM user WHERE Id=$id";
     $stmt_ = $conn->prepare($sql);
     $stmt_->execute();
     $affich = $stmt_ ->fetch();
    
?>

<?php
/* *******************************************la pagination debute ici  ***************************************/

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


// On détermine le nombre total d'utilisateurs
$sql = "SELECT COUNT(*) AS nb_utilisateurs FROM user WHERE état=1";

// On prépare la requête
$query = $conn->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'utilisateurs
$result = $query->fetch();

$nbUtilisateurs = (int) $result['nb_utilisateurs'];

// On détermine le nombre d'utilisateurs par page
$parPage = 7;

// On calcule le nombre de pages total
$pages = ceil($nbUtilisateurs / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage-1) * $parPage;

$list = $conn->prepare( "SELECT * FROM user WHERE état=1 AND Id!=$id ORDER BY Id DESC LIMIT $premier, $parPage;");
$list->execute();
/* ***********************************la pagination fin ici  ******************reste coté front en bas*********************/

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
    <!-- script pour modal suppression --> 
    
  </head>

<body>
   

<div class="container">

<nav class="navbar bg-primary">
  <div class="container-fluid">
  <!--  *****************affichage photo et matricule sur la partie nav ******************************** -->
  <a class="navbar-brand"style="color:white";><?= $affich ['prenom']." ".$affich ['nom'];echo '<img src="data:image;base64,'.base64_encode($_SESSION["photo"]).'" style="width: 100px;height:100px;border-radius:50%;"/>'; ?> </a>
    <a class="navbar-brand"style="color:white";><?= $affich ['matricule']; ?> </a>
     
    <h1 style="color:white";> Espace Admin</h1>
    
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
</nav>
<!-- **********************espace de recherche ***************************************************** -->
<div><br>
          <form method="GET" action=""  >
      <div style=" padding-left:70%;display:flex;justify-content:center;align-items:center;">
      <input class="form_control" type="search" placeholder="rechercher"style="height: 30px;" name="search">
      <button class="btn-blue" type="submit"style="height: 30px;" ><span class="material-symbols-outlined">search
</span></button>
      </div>

    </form> <br></div>
<!-- **********************fin espace de recherche aller voir coté traitement en bas)***************************************************** -->
   

<div class="row">
        <div class="col-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <p>Tableau de bord</p>
                        <a class="nav-link active" aria-current="page" href="espace_admin.php">Utilisateurs</a>
                        <a class="nav-link" href="liste_archive.php">Archives</a>
                        <a class="nav-link" href="paremetre.php">Paramètre</a>
                     
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
<!-- **********************************pagination ************************************ -->
   
<nav>
         <ul class="pagination fixed-bottom justify-content-center">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="?page=<?= $currentPage - 1 ?>" class="page-link"><<</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="?page=<?= $currentPage + 1 ?>" class="page-link">>></a>
                        </li>
                    </ul>
                </nav>
<!-- **********************************fin pagination ************************************ -->
                                  
</body>

</html>
            <?php
            //$sql = "SELECT * FROM user WHERE état=1 AND Id!=$id"; /* afficher les utilisateurs sauf celui qui est connecté */
            //$list= $conn->prepare($sql);
            //$list->execute();
                 /* *************************************traitement recherche*************************************************** */


                if((isset($_GET['search'])) && !empty($_GET['search'])){
                  /* permet d'effectuer la recherche  soit par nom ou prenom ou matricule */
                  $search= $_GET['search'];
                  $list=$conn->query("SELECT * FROM user WHERE état=1 AND nom LIKE '%$search%' OR prenom LIKE '%$search%' OR matricule LIKE '%$search%' AND Id!=$id");
                  $list->execute();
                  //var_dump($list->execute());
                 
              }
              /* *************************************fin traitement recherche*************************************************** */
                                       
                                        while($row = $list->fetch(PDO::FETCH_ASSOC)) :
                                          /* var_dump($row);
                                          exit; */
?>
                                        <tr>
                                        <th><?=  $row['nom'] ?></th>
                                        <td><?= $row['prenom'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['matricule'] ?></td>
                                        <td><?= $row['role'] ?></td>
                                        <td><div class="action">
                                        
                                        <div class="btn-group">
                                        <a href="modifier.php?Id=<?=$row['Id']?> "onclick="return confirm('Voulez-vous modifier cet utilisateur');"class="btn btn-white " aria-current="page"><span class="material-symbols-outlined">edit_square
                                        </span></a>
                                        <a href="delete.php?Id=<?=$row['Id']?> " onclick="return confirm('Voulez vous vraiment archiver cet utilisateur');" class="btn btn-danger" id="suppression"><span class="material-symbols-outlined">delete
                                        </span></a>
                                       
                                        <a href="switch.php?Id=<?=$row['Id']?> " class="btn btn-white"><span class="material-symbols-outlined">sync_alt
                                        </span></a>
                          </div>
                                        </td>
                                        </tr> 
                                <?php endwhile;?>
                                
                          
                        </div>
                        
                        
    
                </div>
        </div>
    </div>
</div>





                                        



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>










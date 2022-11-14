
<?php include 'connect_db.php';
?>
<?php include 'update_compte_admin.php';
?>
<!-- recuperation des données à modifier -->
<?php
if(isset($_GET['Id']))

{
    $Id=$_GET['Id'];
    $req=$conn->query("SELECT * FROM user WHERE Id=$Id");
    $mod=$req->fetch();
    
/*   header("Location:espace_admin.php"); */
}
?>
<!-- modification -->
<?php
if(isset($_POST['submit'])){
  $mdp= $_POST['mot_de_passe'];
 
  $sql="UPDATE user SET  mot_de_passe='$mdp' WHERE Id=$Id"; /* remplacement des données à modifier */
  $req=$conn->prepare($sql);
  $mod=$req->execute();

header("Location:espace_admin.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!--  <link rel="stylesheet" href="style.css"> -->
  <title>Modification</title>
</head>
<body>
    <h2 align=center> Paramètre mot de passe </h2>
    <div class="global">
   <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
              <h2><p align=center>Modification mot de passe</p></h2>
  
                <form action="" method="POST" class="mb-3 mt-md-4 " id="form" enctype="multipart/form-data"> <!-- multipart/form-data pour la photo -->
                      <div class="mb-3 col-md-12 d-flex gap-2">
                      <div class="info1">
                      <label for="text" class="form-label ">Mot de passe actuel</label>
                      <input onkeyup="validateInputs()" type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" value ="<?=$mod['mot_de_passe']?>" placeholder="Mot de passe actuelle">
                      </div>
                      <div class="info1">
                      <label for="text" class="form-label ">Nouveau mot de passe</label>
                      <input onkeyup="validateInputs()" type="password" class="form-control" name="mot_de_passe1" id="mot_de_passe1" value ="<?=$mod['mot_de_passe']?>" placeholder="Nouveau Mot de passe">
                    </div>
                    <div class="error"></div>
                  </div>

                  <div class="info1">
                      <label for="text" class="form-label ">Confirmer Nouveau mot de passe</label>
                      <input onkeyup="validateInputs()" type="password" class="form-control" name="mot_de_passe2" id="mot_de_passe2" value ="<?=$mod['mot_de_passe']?>" placeholder="Confirmer nouveau mot de passe">
                    </div>
                    <div class="error"></div>
                  </div>
                                                       
                          </div>
                          
                 
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" type="submit"  name= "submit">Valider</button>
                  </div>
                </form>
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <style>
        .global{
            background-color: rgb(102,145,214); 
        }
        
    </style>


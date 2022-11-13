
<?php include 'connect_db.php';
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
  $prenom= $_POST['prenom'];
  $nom= $_POST['nom'];
  $email= $_POST['email'];
  $sql="UPDATE user SET  prenom='$prenom', nom='$nom', email='$email' WHERE Id=$Id"; /* remplacement des données à modifier */
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
    <h2 align=center> Espace Modification </h2>
    <div class="global">
   <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
              <h2><p align=center>Modification</p></h2>
  
                <form action="" method="POST" class="mb-3 mt-md-4 " id="form" enctype="multipart/form-data"> <!-- multipart/form-data pour la photo -->
                      <div class="mb-3 col-md-12 d-flex gap-2">
                      <div class="info1">
                      <label for="text" class="form-label ">Nom</label>
                      <input onkeyup="validateInputs()" type="text" class="form-control" name="nom" id="nom" value ="<?=$mod['nom']?>" placeholder="Entrer votre nom">
                      </div>
                      <div class="info1">
                      <label for="text" class="form-label ">Prénom</label>
                      <input onkeyup="validateInputs()" type="text" class="form-control" name="prenom" id="prenom" value ="<?=$mod['prenom']?>" placeholder="Entrer votre Prénom">
                    </div>
                    <div class="error"></div>
                  </div>

                    <div class="mb-3 col-md-12 d-flex gap-2">
                      <div class="info1">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value ="<?=$mod['email']?>"placeholder="Entrer votre adresse mail">
                    </div>
                    <!-- <div class="mb-3 col-md-6">
                    <label for="formFileSm" class="form-label">Changer photo</label>
                  <input class="form-control form-control-sm" name="photo"  id="formFileSm" type="file" accept= ".jpg, .png">

                         
                          </div>  -->                                      
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


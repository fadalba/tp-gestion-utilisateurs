<?php include 'connect_db.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!--  <link rel="stylesheet" href="style.css"> -->
  <title>Inscription</title>
 
</head>
<body>
    <h2 align=center> Inscrivez-vous sur  la plateforme sunu école</h2>
    <div class="global">
   <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
              <h2><p align=center>Inscription</p></h2>
  
                <form action="verification.php" method="POST" class="mb-3 mt-md-4 " id="form" enctype="multipart/form-data"> <!-- multipart/form-data pour la photo -->
                      <div class="mb-3 col-md-12 d-flex gap-2">
                      <div class="info1">
                      <label for="text" class="form-label ">Nom</label>
                      <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom">
                      <p style> error message</p>
                    </div>
                      <div class="info1">
                      <label for="text" class="form-label ">Prénom</label>
                      <input  type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer votre Prénom">
                      <p> error message</p>
                    </div>
                   
                  </div>

                    <div class="mb-3 col-md-12 d-flex gap-2" >
                      <div class="info1">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrer votre adresse mail">
                    <p> error message</p>
                    </div>
                    <div class="mb-3 col-md-6" >
                      
                                <label for="inputState" class="form-label">Role</label>
                                <select id="inputState" class="form-select" name="role">
                                <option value="" selected></option>
                                <option value="admin">admin</option>
                                <option value="utilisateur">Utilisateur</option>
                                
                          </select>
                          <p style> error message</p>
                          </div>                                       
                          </div>
                          
                  <div class="mb-3 col-md-12 d-flex gap-2">
                    <div class="info1">
                    <label for="password" class="form-label">Mot de passe</label>
                    
                    <input type="password" class="form-control "name="mot_de_passe"id="password" placeholder="*******">
                    <p> error message</p>
                    <!-- <div class="error"></div> -->
                  </div>
                    
                    <div  class="info1">
                    <label for="password" class="form-label">Confirmer Mot de passe</label>
                    <input type="password"  class="form-control" name="mot_de_passe "id="password2" placeholder="*******">
                    <p> error message</p>
                  </div>
                </div>
                <div class="mb-3 col-md-6" class="info1">
                  <label for="formFileSm" class="form-label">Ajout photo</label>
                  <input class="form-control form-control-sm" name="photo"  id="formFileSm" type="file" accept= ".jpg, .png">
                  
            </div>
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" type="submit"  name= "submit2" id= "submit2">S'inscrire</button>
                  </div>
                </form>
                <div>
                  <h6 class="mb-0  text-center">Se Connecter<a href="index.php" class="text-primary fw-bold"> ici
                      </a></h6>
                </div>

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
        /* style du js pour le controle de saisie  inscription*/
        .success input {
    border:3px green solid;
}

 .global i {
     position:absolute;
     right:10px;
     top:35px;
     visibility: hidden;
 }


 .success i.fa-check-circle{
     visibility: visible;
     color:green;
 }

 .error i.fa-exclamation-circle {
    visibility: visible;
    color:red;
}


 .global p {
     font-size: 15px;
     color:red;
     visibility: hidden;
 }

 .error p {
     visibility: visible;
 }
    </style>

<script src="ctrl_saisie_ins.js"></script> 
    </body>
    </html>
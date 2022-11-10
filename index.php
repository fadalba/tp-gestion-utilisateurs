<?php include "acces_compte.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
  </head>

<body>
    <br/>
    <h2 align=center> Bienvenue sur la plateforme sunu école</h2>
    <div class="global">
   <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-danger">
              <div class="card-body p-5">
                <form class="mb-3 mt-md-4" action="acces_compte.php" method="post" id="form" >
                  <h2><p align=center>Connexion</p></h2>
                    <div class="mb-3">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrer votre adresse mail">
                    <p id="error1"></p>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label ">Mot de passe</label>
                    <input type="password" class="form-control" name="mdp" id="password" placeholder="*******">
                    <p id="error2"></p>
                  </div>
                  
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" name="submit" type="submit">Connexion</button>
                  </div>
                
                </form>
               
                <div>
                  <p class="mb-0  text-center"><a href="inscription.php" class="text-primary fw-bold">Créer un compte ici
                      </a></p>
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

        .card-body {
          background-color: rgb(102,145,214); 
        }
    </style>
    
</body>
<script src="ctrl_saisie_connexion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>


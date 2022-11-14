<?php include 'connect_db.php';

?>
<?php include 'update_compte_admin.php';
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
    <h2 align=center> Plateforme sunu école</h2>
    <div class="global">
   <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card bg-white">
              <div class="card-body p-5">
              <h2><p align=center>changer photo</p></h2>
  
                <form action="verification.php" method="POST" class="mb-3 mt-md-4 " id="form" enctype="multipart/form-data"> <!-- multipart/form-data pour la photo -->
                    
                <div class="mb-3 col-md-6" class="info1">
                  <label for="formFileSm" class="form-label"></label>
                  <input class="form-control form-control-sm" name="photo"  id="formFileSm" type="file" accept="image/jpg, image/png, image/jpeg">
                  
            </div>
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" type="submit"  name= "submit2" id= "submit2">Valider</button>
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


    </body>
    </html>
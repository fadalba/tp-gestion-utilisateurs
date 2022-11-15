<?php include 'connect_db.php';
?>

<?php

  // set the PDO error mode to exception
 /*  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
  if(isset($_POST['submit2'])){ // on vérifie avec isset c'est la valeur existe
 // on déclare des variables en utilisants les mêmes que la base de donnéee
    $date_inscrit=date('y-m-d h:i:s');
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $mdp=$_POST["mot_de_passe"];
    $email=$_POST["email"];
    $role=$_POST["role"];
    $photo = null;
    /*********************************ajout photo************************************ */ 
    if($_FILES['photo']['size'] !== 0){
      $photo=file_get_contents($_FILES['photo']['tmp_name']) ?? null;
    }
      
  /*************************fin ajout photo*****aller voir traitement sur espace admin et espace user******/ 
   

   /* ************************************cryptage mot de passe ******************************* */

   $mdp= password_hash($mdp, PASSWORD_DEFAULT);
   /* ***********************************fin cryptage mot de passe **************************** */
   /*************************vérification mail existant*****************************************/ 
    $select_mail = $conn->prepare("SELECT * FROM user WHERE email = ?  limit 1 ");
   $select_mail->execute([$email]);
   /* var_dump($select_mail->rowCount());exit; */
      
   if ($select_mail->rowCount() > 0)
  
   {
       $message [] = "L'adresse mail existe déja.";
    
       header("location: inscription.php?erreur=l'adresse mail existe déja");
       exit;
   } 
 /*************************fin vérification mail existant*************************/ 
  
   /* ***********************************requete insertion sur la table user bd**************************** */
    $sql = "INSERT INTO user (prenom, nom, mot_de_passe, état,email,`role`, date_inscrit,photo)
    VALUES('$prenom','$nom','$mdp',1,'$email','$role', '$date_inscrit','$photo')";
          
    if ($conn->exec($sql)) {
      echo "inscrit  avec succès";
      header("Location: index.php");
     
    } else {
      echo "Erreur: " . $sql . "
    " . $conn->error;
    }
    /* ***********************************fin requete insertion sur la bd **************************** */

    /************************************ autogénerer matricule ****************************************/

    $matricule =  'Mat-'. $conn->lastInsertId();
    $mat = "UPDATE  user SET matricule = '$matricule' WHERE email = '$email'";
    $modification = $conn->prepare($mat);
    $modification->execute();
/* ***************************************fin matricule ****************************************/

    $conn->close();
    }   
  

?>

 
 
 
 
 
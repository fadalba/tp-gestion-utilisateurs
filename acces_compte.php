<?php include "connect_db.php" ?>


<?php
    if (isset($_POST['submit'])) {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          } 
    
        $email = test_input($_POST['email']);
        $mdp =  test_input($_POST['mdp']);

        $sql_mail = "SELECT email, mot_de_passe from user WHERE email = ?";
        $select_mail = $conn->prepare($sql_mail);
        $select_mail->execute([$email]);
      /* ****************************** mp cripté ******************************/
          if ($select_mail->rowCount() > 0) {
            $hashedPwd = $select_mail->fetch()["mot_de_passe"];
            if (password_verify($mdp, $hashedPwd)) {

                $sql_all = "SELECT * from user WHERE email = ?";
                $select_all = $conn->prepare($sql_all);
                $select_all->execute([$email]) ;
                $row = $select_all->fetch(PDO::FETCH_ASSOC);

                    if ($row['role'] == 'admin' ) {
                        session_start();
                        $_SESSION['identifiant'] = $row['Id'];
                        $_SESSION['photo'] = $row['photo'];
                          header('location:espace_admin.php');
                    }
                    else{
                        session_start();
                        $_SESSION['identifiant'] = $row['Id'];
                        
                        header('location:espace_user_simple.php');
                    }

              }
            else{
                echo 'mot de passe incorrect';
            }
          }
          else
          {
            echo 'compte inéxistante';
          }

          // Redirection vers une page de connxion (user_simple ou admin)
          /* if(($data['role']=='admin')){
            header('Location: espace_admin.php');

          }

          elseif(($data['role']=='user')){
            header('Location: espace_user_simple.php');

          } */

    }
?>
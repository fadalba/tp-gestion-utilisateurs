<?php
include "connect_db.php"

?>

<?php 
    $id = $_GET['Id'];
    $sql = "SELECT * from user WHERE état = 1  AND Id = $id"; // ici on selectionne tous les utilisateurs dont l'état est actif par leur id
    $select = $conn->prepare($sql);
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

        if ($row['role'] == 'admin') {
            $req_sql = "UPDATE user SET `role`= 'user' WHERE Id = $id ";
            $req = $conn->prepare($req_sql);
            $req->execute();
            header('location:espace_admin.php');
        }
        else  {
            $req_sql = "UPDATE user SET `role` = 'admin' WHERE Id = $id ";
            $req = $conn->prepare($req_sql);
            $req->execute();
            header('location:espace_admin.php');
        }
    ?>

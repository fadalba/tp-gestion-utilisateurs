<?php
include 'connect_db.php';

// var_dump($_GET["id"]);die;

    if(isset($_GET["Id"])){
        $id = $_GET["Id"];
        if(!empty($id) && is_numeric($id)){
            include("connect_db.php");
                $list = "UPDATE user SET état = 1 where Id=$id";
                $result = $conn->query($list);
                header("Location:liste_archive.php");
        }
    }

?>
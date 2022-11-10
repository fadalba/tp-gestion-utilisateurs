<?php
        if($_SESSION['mail'] !== "")
        {
            session_unset();
            header("location:index.php");
            session_destroy();
         }
?>  
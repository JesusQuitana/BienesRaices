<?php

session_start();
    
if(isset($_SESSION)) {
        $_SESSION=[];
        header("location: ../index.php");
    }
?>
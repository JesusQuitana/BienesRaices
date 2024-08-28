<?php
    require 'includes/app.php';

    $user="admin01";
    $email="correo1@correo.com";
    $password="0000";

    $passwordHash=password_hash($password, PASSWORD_DEFAULT);
    echo $passwordHash;

    try {
        $conexion=new PDO("mysql: host=localhost; dbname=bienes_raices", "root", "K-jh564.*");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query="INSERT INTO `usuarios` (`USER`, `EMAIL`, `PASSWORD`) VALUES (:user, :email, :contrasea)";
        $consulta = $conexion->prepare($query);
        $consulta->bindValue(":email", $email);
        $consulta->bindValue(":contrasea", $passwordHash);
        $consulta->bindValue(":user", $user);
        $consulta->execute();
        if($consulta->rowCount()!=0){
            $conexion=null;
            header("location: index.php");
        }
    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }

?>
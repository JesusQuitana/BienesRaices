<?php

    declare(strict_types=1);
    require '../../includes/app.php';

    session_start();

    if($_SESSION==[]) {
        header('location: ../../index.php');
    }

    $id=$_POST["id"];

    try {
        $conexion=new PDO($database, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_select= "SELECT * FROM propiedades WHERE ID=:id";

        $consulta_select = $conexion->prepare($query_select);
        $consulta_select->bindValue(":id", $id);
        $consulta_select->execute();
        $registro_select = $consulta_select->fetch(PDO::FETCH_ASSOC);
        unlink("../../imagenes/" . $registro_select["IMAGEN"]);

        $query_delete = "DELETE FROM propiedades WHERE ID=:id";
        $consulta_delete=$conexion->prepare($query_delete);
        $consulta_delete->bindValue(":id", $id);
        $consulta_delete->execute();
        if($consulta_delete->rowCount()!=0) {
            header("location: ../index.php?e=1");
        }else {
            header("location: ../index.php?e=2");

        }
    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }

?>
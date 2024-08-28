<?php
    require '../includes/funciones.php';
    include '../includes/app.php';

    $errores=[];
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $user=$_POST["user"];
        $password=$_POST["password"];
        $passwordVerify="";

        if($user=="") {
            $errores[]="Coloque un Usuario Valido";
        }
        if($password=="") {
            $errores[]="Coloque una Contraseña Valida";
        }

        try {
            $conexion=new PDO("mysql: host=localhost; dbname=bienes_raices", "root", "K-jh564.*");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query= "SELECT * FROM usuarios WHERE USER=:user";
            $consulta=$conexion->prepare($query);
            $consulta->bindValue(":user", $user);
            $consulta->execute();
            $usuarios=$consulta->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($usuarios as $usuario) {
                $passwordVerify = $usuario["PASSWORD"];
                $name = $usuario["USER"];
            }    
            if($consulta->rowCount()!=0) {
                $auth = password_verify($password, $passwordVerify);
                if($auth) {
                    session_start();
                    $_SESSION["login"] = true;
                    $_SESSION["usuario"] = $name;
                    header("location: ../admin/index.php?x=1");
                }else {
                    $errores[]="Email o Contraseña Incorrecta";
                }
            }
        }
        catch(Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    template("header");
?>

<main class="contenedor">
    <?php
        foreach($errores as $error) {
            echo "<p class='alerta roja'>".$error."</p>";
        }
    ?>
    <form method="post">
        <fieldset class="contacto max-centrado">
            <legend>Autenticar Usuario</legend>
            <div class="contacto-1">
            <label for="user">Usuario</label>
            <input type="text" id="user" class="contacto-1_nombre inputs" placeholder="Tu Usuario" name="user" require>
            <label for="password">Contraseña</label>
            <input type="password" id="password" class="contacto-1_email inputs" placeholder="Tu Password" name="password" require>
            <input type="submit" class="btn verde" value="Enviar" style="margin-top: 2rem">
        </div>
        </fieldset>
    </form>
</main>


<script src="../build/js/alertas.js"></script>
<?php
    template("footer");
?>
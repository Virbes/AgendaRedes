<?php
include 'inc/funciones/funciones.php';
include 'inc/layout/head.php';
?>

<header class="barra">
    <div class="contenedor">
        <h1>Iniciar sesión</h1>
    </div>
</header>

<div class="bg-amarillo contenedor sombra">
    <form action="#" class="formulario" method="post">
        <legend>Ingresa tus datos</span></legend>

        <div class="campo">
            <label>Usuario:</label>
            <input type="text" placeholder="Ingresa tu nombre de usuario" id="usuername" name="username">
        </div>

        <div class="campo">
            <label>Contraseña:</label>
            <input type="password" placeholder="Ingresa tu contraseña" id="password" name="password">
        </div>

        <div class="boton">
            <input type="submit" value="Iniciar sesion">
        </div>

        <?php
            $iniciarSesion = new IniciarSesion();
            $iniciarSesion -> login();
        ?>
    </form>
</div>

<div class="contenedor btn-cancelar">
    <a href="index.php" class="btn btn-volver">Cancelar</a>
</div>

<?php
    class IniciarSesion {

        public static function login() {

            if(isset($_POST['username'])){

                $user = $_POST['username'] == 'admin' ? true : false;
                $password = $_POST['password'] == 'admin123' ? true : false;
                
                if ($user && $password) {
                    $_SESSION['username'] = 'admin';
                    echo 
                    '<script>
                        window.location = "/agenda";
                    </script>';
                } else {
                    echo '<script>alert("Datos no validos")</script>';
                }
            }

        }

    }

    include 'inc/layout/footer.php';      
?>
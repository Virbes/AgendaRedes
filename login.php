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
    <form id="contacto" action="#" class="formulario">
        <legend>Ingresa tus datos</span> </legend>

        <div class="campo">
            <label for="nombre">Usuario:</label>
            <input type="text" placeholder="Ingresa tu nombre de usuario" id="usuername">
        </div>

        <div class="campo">
            <label for="nombre">Contraseña:</label>
            <input type="text" placeholder="Ingresa tu contraseña" id="password">
        </div>

        <div class="boton">
            <input type="submit" value="Iniciar sesion">
        </div>
    </form>
</div>

<div class="contenedor btn-cancelar">
    <a href="index.php" class="btn btn-volver">Cancelar</a>
</div>
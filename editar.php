<?php 
     include 'inc/funciones/funciones.php';
     include 'inc/layout/head.php'; 

     $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

     if(!$id) {
          die('No es válido');
     }

     $resultado = obtenerContacto($id);
     $contacto = $resultado->fetch_assoc();
?>


<header class="barra">
     <div class="contenedor">
          <h1>Editar Contacto</h1>
     </div>
</header>

<div class="bg-amarillo contenedor sombra">
     <form id="contacto" action="#" class="formulario">
          <legend>Edite el Contacto</span> </legend>

          <?php include 'inc/layout/formulario.php'; ?>
     </form>
</div>

<div class="contenedor btn-cancelar">
        <a href="index.php" class="btn btn-volver">Cancelar</a>
</div>


<?php include 'inc/layout/footer.php'; ?>

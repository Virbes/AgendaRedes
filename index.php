<?php
include 'inc/funciones/funciones.php';
include 'inc/layout/head.php';
?>

<header class="barra">
     <h1>Agenda de Contactos</h1>
</header>

<div class="contenedor login">
     <a class="btn-login" href="login.php">
          <span>Log-in</span>
          <i class="fas fa-sign-in-alt"></i>
     </a>
</div>

<section class="bg-amarillo contenedor sombra">
     <form id="contacto" action="#" class="formulario">
          <legend>Añada un contacto</legend>

          <?php
          $contacto['nombre'] = false;
          $contacto['correo'] = false;
          $contacto['telefono'] = false;
          include 'inc/layout/formulario.php';
          ?>
     </form>
</section>

<section class="bg-blanco contenedor sombra contactos">
     <div class="contenedor-contactos">
          <h2>Contactos</h2>

          <input type="text" id="buscar" class="buscar sombra" placeholder="Buscar Contactos...">
          <p class="total-contacto"><span></span> Contactos</p>

          <div class="contenedor-tabla">
               <table id="listado-contactos" class="listado-contacto">
                    <thead>
                         <tr>
                              <th>Nombre</th>
                              <th class="correo">Email</th>
                              <th>Teléfono</th>
                              <th>Acciones</th>
                         </tr>
                    </thead>

                    <tbody>
                         <?php
                         $contactos = obtenerContactos();
                         if ($contactos->num_rows) {

                              foreach ($contactos as $contacto) { ?>
                                   <tr>

                                        <td><?php echo $contacto['nombre']; ?></td>
                                        <td class="correo"><?php echo $contacto['correo']; ?></td>
                                        <td><?php echo $contacto['telefono']; ?></td>
                                        <td>
                                             <a class="btn-editar btn disable-element" href="editar.php?id=<?php echo $contacto['id']; ?>">
                                                  <i class="fas fa-pen-square"></i>
                                             </a>
                                             <button data-id="<?php echo $contacto['id']; ?>" type="button" class="btn-borrar btn boton disable-element">
                                                  <i class="fas fa-trash-alt"></i>
                                             </button>
                                        </td>
                                   </tr>
                         <?php }
                         }
                         ?>

                    </tbody>
               </table>
          </div>
     </div>
</section>

<?php include 'inc/layout/footer.php'; ?>
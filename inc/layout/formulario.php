<div class="campos">

     <div class="campo">
          <label for="nombre">Nombre:</label>
          <input 
               type="text" 
               placeholder="Nombre Contacto" 
               id="nombre"
               value="<?php echo $contacto['nombre'] ? $contacto['nombre'] : '' ?>"
          >
     </div>

     <div class="campo">
          <label for="correo">Email:</label>
          <input 
               type="email" 
               placeholder="Correo Electronico" 
               id="correo"
               value="<?php echo ($contacto['correo']) ? $contacto['correo'] : '';  ?>"
          >
     </div>
     
     <div class="campo">
          <label for="telefono">Teléfono:</label>
          <input 
               type="tel" 
               placeholder="Teléfono Contacto" 
               id="telefono"
               value="<?php echo ($contacto['telefono']) ? $contacto['telefono'] : '';  ?>"
          >
     </div>

</div>

<div class="boton">
     <?php
          $textoBtn = $contacto['telefono'] ? 'Guardar' : 'Añadir'; // Añadir
          $accion = $contacto['telefono'] ? 'editar' : 'crear';     // Crear
     ?>

     <input type="hidden" id="accion" value="<?php echo $accion; ?>">

     <?php if( isset( $contacto['id'] )) { ?>
          <input type="hidden" id="id" value="<?php echo $contacto['id']; ?>">
     <?php } ?>
     
     <input type="submit" value="<?php echo $textoBtn; ?>">
</div>
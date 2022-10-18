<?php
$modeloContactos = new ModeloContactos;

if (isset($_POST['accion'])) {
     switch ($_POST['accion']) {
          case 'crear': $modeloContactos->crearContacto(); break;
          case 'editar': $modeloContactos->editarContacto(); break;
     }
} else {
     $modeloContactos->eliminarContacto();
}

class ModeloContactos {

     public static function crearContacto() {
          require_once('../funciones/bd.php');

          $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
          $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
          $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

          try {
               $stmt = $conn->prepare("INSERT INTO contactos (nombre, correo, telefono) VALUES (?, ?, ?)");
               $stmt->bind_param("sss", $nombre, $correo, $telefono);
               $stmt->execute();
               if ($stmt->affected_rows == 1) {
                    $respuesta = array(
                         'respuesta' => 'correcto',
                         'datos' => array(
                              'nombre' => $nombre,
                              'correo' => $correo,
                              'telefono' => $telefono,
                              'id_insertado' => $stmt->insert_id
                         )
                    );
               }
               $stmt->close();
               $conn->close();
          } catch (Exception $e) {
               $respuesta = array(
                    'error' => $e->getMessage()
               );
          }

          echo json_encode($respuesta);
     }

     public static function eliminarContacto() {
          require_once('../funciones/bd.php');

          $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

          try {
               $stmt = $conn->prepare("DELETE FROM contactos WHERE id = ? ");
               $stmt->bind_param("i", $id);
               $stmt->execute();
               if ($stmt->affected_rows == 1) {
                    $respuesta = array(
                         'respuesta' => 'correcto'
                    );
               }
               $stmt->close();
               $conn->close();
          } catch (Exception $e) {
               $respuesta = array(
                    'error' => $e->getMessage()
               );
          }
          echo json_encode($respuesta);
     }

     public static function editarContacto() {
          require_once('../funciones/bd.php');

          $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
          $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
          $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
          $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

          try {
               $stmt = $conn->prepare("UPDATE contactos SET nombre = ?, correo = ?, telefono = ? WHERE id = ?");
               $stmt->bind_param("sssi", $nombre,  $correo,  $telefono, $id);
               $stmt->execute();
               if ($stmt->affected_rows == 1) {
                    $respuesta = array(
                         'respuesta' => 'correcto'
                    );
               } else {
                    $respuesta = array(
                         'respuesta' => 'error'
                    );
               }
               $stmt->close();
               $conn->close();
          } catch (Exception $e) {
               $respuesta = array(
                    'error' => $e->getMessage()
               );
          }
          echo json_encode($respuesta);
     }
}

<?php

$conn = new mysqli('localhost', 'root', '', 'app_kanban');

if (isset($_POST["action"]) && $_POST["action"] == "crear_registro") {


  $sql = " INSERT INTO `$_POST[columna]` 
    (`id_tablero`, `id_usuario`)
    VALUES ( '$_POST[tablero]', '$_POST[id_usuario]' )";

  $result = $conn->query($sql);
  $last_id =  $conn->insert_id;

  $conn->close();
  echo $last_id;
}

if (isset($_POST["action"]) && $_POST["action"] == "editar_registro") {

  $sql = "UPDATE `$_POST[columna]` 
  SET `contenido`='$_POST[contenido]' 
  WHERE `id`='$_POST[id]' 
  AND `id_tablero`='$_POST[tablero]' 
  AND `id_usuario`='$_POST[id_usuario]'";
  
  $result = $conn->query($sql);

  echo 'editado';
  $conn->close();
}


if (isset($_POST["action"]) && $_POST["action"] == "deleteRegister") {

  $sql = " DELETE FROM `$_POST[columna]` 
  WHERE `id` = '$_POST[id]'  
  AND `id_tablero` ='$_POST[tablero]'  
  AND `id_usuario`='$_POST[id_usuario]' 
  ";
  $result = $conn->query($sql);
  $conn->close();
  return $result;
}

if (isset($_POST["action"]) && $_POST["action"] == "copiar_registro") {

  $sql = "INSERT INTO
  `$_POST[columna]` ( `id_tablero`, `contenido`,  `id_usuario` )
  VALUES ('$_POST[tablero]','$_POST[contenido]', '$_POST[id_usuario]' )";

  $result = $conn->query($sql);
  $last_id =  $conn->insert_id;

  echo $last_id;
  $conn->close();
}




if (isset($_POST["action"]) && $_POST["action"] == "registro_papelera") {

  $sql = " DELETE FROM `$_POST[columna]` 
  WHERE `id` = '$_POST[id]'  
  AND `id_tablero` ='$_POST[tablero]'";

  $result = $conn->query($sql);
  echo $result;
  $conn->close();

}

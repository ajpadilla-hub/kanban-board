<?php

    $id_usuario = $_COOKIE['user_id'];

    include './classes/columnas.class.php';
    $cols = new Columnas($conn);

    $columna1 =  $cols->mostrar_columna1($_GET['id_tablero'], $id_usuario);
    $columna2 =  $cols->mostrar_columna2($_GET['id_tablero'], $id_usuario);
    $columna3 =  $cols->mostrar_columna3($_GET['id_tablero'], $id_usuario);
    $columna4 =  $cols->mostrar_columna4($_GET['id_tablero'], $id_usuario);

?>
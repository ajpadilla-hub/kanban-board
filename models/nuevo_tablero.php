<?php

$tablero = new Tableros($conn);


if (isset($_POST['action']) && $_POST['action'] == 'nuevo_tablero') {

    $tablero->crear_tablero();

}
if (isset($_GET['action']) && $_GET['action'] == 'eliminar_tablero') {

    $id_tablero = isset($_GET['id_tablero']) ? $_GET['id_tablero'] : '';
    $id_usuario = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';
    $tablero->eliminar_tablero($id_tablero, $id_usuario);
}
$mostrar_tableros = $tablero->mostrar_tableros();


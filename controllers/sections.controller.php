<?php

$section = isset($_GET["section"]) ? $_GET["section"] : '';

switch ($section) {


    case 'nuevo_tablero':
        include './classes/tablero.class.php';
        include './models/nuevo_tablero.php';
        include './principal.php';
        break;

    case 'principal':
        include './classes/tablero.class.php';
        include './models/nuevo_tablero.php';
        include './principal.php';
        break;

    case 'registro':
        include './models/access.model.php';
        include './views/form_registro.php';
        break;

    case 'tablero_creado':
        include './classes/columnas.class.php';
        $cols = new Columnas($conn);
        $id_tablero = $_COOKIE['tablero_actual'];
        $id_usuario = $_COOKIE['user_id'];
        $columna1 =  $cols->mostrar_columna1($id_tablero, $id_usuario);
        $columna2 =  $cols->mostrar_columna2($id_tablero, $id_usuario);
        $columna3 =  $cols->mostrar_columna3($id_tablero, $id_usuario);
        $columna4 =  $cols->mostrar_columna4($id_tablero, $id_usuario);
        include './tablero.php';
        break;

    case 'acceder_tablero':
        setcookie('tablero_actual', $_GET['id_tablero'], 0, '/');
        include './models/mostrar.columnas.php';
        include './tablero.php';
        break;

    case 'eliminar_tablero':
        include './classes/tablero.class.php';
        include './models/nuevo_tablero.php';
        include './principal.php';

        break;


    default:
        include './models/access.model.php';
        include './views/form_acceso.php';
        break;
}

<?php
    define("SERVER", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DDBB", "app_kanban"); 
    $conn = new mysqli(SERVER, USER, PASSWORD, DDBB);
    $conn->set_charset("utf8");
?>
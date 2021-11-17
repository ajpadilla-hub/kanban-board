
<?php

class Columnas
{

    public  $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function mostrar_columna1($tablero, $id_usuario)
    {
        $sql = "SELECT * FROM `columna1` WHERE `id_tablero` = $tablero AND `id_usuario` = $id_usuario";
        $result = $this->conn->query($sql);
        $columna = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columna .=
                    "<div class='draggable' draggable='true' id='$row[id]'>
                    <textarea  draggable='false' class='txt' cols='30' rows='2'>$row[contenido]</textarea>
                    <p  draggable='false' class='parrafo'>
                        <img class='imgParrafo' src='./assets/images/delete.png' alt='icono para eliminar'>
                    </p>
                </div>";
            }
        }


        return $columna;
    }
    function mostrar_columna2($tablero, $id_usuario)
    {
        $sql = "SELECT * FROM `columna2` WHERE `id_tablero` = $tablero AND `id_usuario` = $id_usuario";
        $result = $this->conn->query($sql);
        $columna = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columna .=
                    "<div class='draggable' draggable='true' id='$row[id]'>
                    <textarea  draggable='false' class='txt' cols='30' rows='2'>$row[contenido]</textarea>
                    <p  draggable='false' class='parrafo'>
                        <img class='imgParrafo' src='./assets/images/delete.png' alt='icono para eliminar'>
                    </p>
                </div>";
            }
        }


        return $columna;
    }
    function mostrar_columna3($tablero, $id_usuario)
    {
        $sql = "SELECT * FROM `columna3` WHERE `id_tablero` = $tablero AND `id_usuario` = $id_usuario";
        $result = $this->conn->query($sql);
        $columna = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columna .=
                    "<div class='draggable' draggable='true' id='$row[id]'>
                    <textarea  draggable='false' class='txt' cols='30' rows='2'>$row[contenido]</textarea>
                    <p  draggable='false' class='parrafo'>
                        <img class='imgParrafo' src='./assets/images/delete.png' alt='icono para eliminar'>
                    </p>
                </div>";
            }
        }


        return $columna;
    }

    function mostrar_columna4($tablero, $id_usuario)
    {
        $sql = "SELECT * FROM `columna4` WHERE `id_tablero` =  $tablero AND `id_usuario` = $id_usuario";
        $result = $this->conn->query($sql);
        $columna = '';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columna .=
                    "<div class='draggable' draggable='true' id='$row[id]'>
                    <textarea  draggable='false' class='txt' cols='30' rows='2'>$row[contenido]</textarea>
                    <p  draggable='false' class='parrafo'>
                        <img class='imgParrafo' src='./assets/images/delete.png' alt='icono para eliminar'>
                    </p>
                </div>";
            }
        }


        return $columna;
    }
}








?>
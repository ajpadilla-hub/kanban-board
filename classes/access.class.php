<?php

class Access
{
    public  $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function  access_allow(  )
    {
        $sql =
            "
            SELECT * 
            FROM usuarios 
            WHERE `usuario` = '$_POST[email]' and 
            `password` = '$_POST[password]'
            ";
        $result = $this->conn->query($sql);
        $data = $result->fetch_assoc(); 
        return $data;
    }


    function register()
    {
        $sql =
            "
            INSERT INTO `usuarios`
            ( `usuario`, `password` ) 
            VALUES 
            ('$_POST[email_address]','$_POST[password]')
            ";
        $result = $this->conn->query($sql);
        if ($result){

            echo 'registrado exitosamente';
        }
    }
}

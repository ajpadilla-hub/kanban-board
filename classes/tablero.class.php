    <?php
 
    class Tableros{
        public  $conn;
        function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function mostrar_tableros()
        {
            $sql = "SELECT * FROM `tableros` WHERE `id_usuario` = $_COOKIE[user_id]";
            $result = $this->conn->query($sql);
            $tableros='';
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tableros.="
                    <div class='divtabUser'>
                        <a href='index.php?section=acceder_tablero&id_tablero=$row[id]'>
                            <p>$row[nombre_tablero]</p>
                        </a>
                        <p> 
                            <a href='index.php?section=eliminar_tablero&action=eliminar_tablero&id_tablero=$row[id]'>
                                <img class='borrar-tablero' src='./assets/images/delete.png' alt='icono para eliminar'>
                            </a>
                        </p>
                    </div>";
                }
                
                return $tableros;
            }
        }

        function crear_tablero()
        {
            $sql1 = "SELECT * FROM `tableros` WHERE `nombre_tablero` = '$_POST[nombre_tablero]' and `id_usuario` = '$_COOKIE[user_id]'";
            $result1 = $this->conn->query($sql1);
        
            if (!$result1->num_rows) {
        
                $sql2 = "INSERT INTO `tableros`(`nombre_tablero`, `id_usuario` )
                VALUES ('$_POST[nombre_tablero]','$_COOKIE[user_id]')";
                $result2 = $this->conn->query($sql2);

                $tablero_actual = $this->conn->insert_id;

                setcookie('tablero_actual',$tablero_actual, 0,'/');

                header('Location:index.php?section=tablero_creado');
                exit;
            }
            else {

                echo "nombre tablero ya existe";
            }
        }

        function eliminar_tablero($id_tablero, $id_usuario)
        { 
            $sql  = "DELETE FROM `tableros` WHERE `id` = $id_tablero AND `id_usuario` = $id_usuario ;";
            $result = $this->conn->query($sql);
            $sql  = "DELETE FROM `columna1` WHERE `id_tablero` = $id_tablero AND `id_usuario` = $id_usuario;";
            $result = $this->conn->query($sql);
            $sql  = "DELETE FROM `columna2` WHERE `id_tablero` = $id_tablero AND `id_usuario` = $id_usuario;";
            $result = $this->conn->query($sql);
            $sql  = "DELETE FROM `columna3` WHERE `id_tablero` = $id_tablero AND `id_usuario` = $id_usuario;";
            $result = $this->conn->query($sql);
            $sql  = "DELETE FROM `columna4` WHERE `id_tablero` = $id_tablero AND `id_usuario` = $id_usuario;";
            $result = $this->conn->query($sql);
            
            
        }


    }
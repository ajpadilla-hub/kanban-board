<?php

    include './classes/access.class.php';
    $access = new Access($conn);

    if (isset($_POST['action']) && $_POST['action'] == 'access') {

        $allow = $access->access_allow();

        if ($allow) {

            $user_id = $allow["id"];
            if($_POST['recordar']){
                
                setcookie('user_id',$user_id, time()+60*60*24*30, '/');
            }else{

                setcookie('user_id',$user_id, 0, '/');
            }

            header("Location: ./index.php?section=principal");

            exit;
        }else{
            echo 'datos incorrectos';
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'register') {

        $access->register();
        header("Location: ./views/form_acceso.php");
        exit;

    }




?>
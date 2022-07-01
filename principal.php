<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /*  estilos generales */
        * {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0%;
            box-sizing: border-box;
        }

        .container {

            display: flex;
        }

        .container-right {
            width: 86%;

        }

        header {
            height: 100px;
        }

        main {

            height: 700px;
            background-color: rgba(243, 243, 236, 0.692);

        }

        aside {
            width: 14%;
            color: aliceblue;
            background-color: rgba(2, 167, 218, 0.815);
            height: 800px;
        }

        .logo {
            background-color: rgba(2, 167, 218, 0.815);
            color: aliceblue;

            display: flex;
            justify-content: center;
            align-items: center;

            height: 100px;

        }

        .nav {
            background-color: rgba(2, 167, 218, 0.815);
            color: aliceblue;

            height: 500px;
            display: flex;
            flex-direction: column;

        }

        .nav ul {


            padding: 0;
            border-top-color: white;
            border-top-style: solid;
            border-top-width: 1px;


            border-bottom-color: white;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .nav ul li {
            border-top-color: white;
            border-top-style: solid;
            border-top-width: 1px;

            border-bottom-color: white;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            padding: 12px;
            font-size: 12px;
            font-weight: 600;
        }




        header a,
        aside a {
            color: white;

            text-decoration: none;
        }

        aside a {
            color: white;

            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }




        .main-sup {

            background-color: rgb(241, 237, 231);
            height: 50%;

        }

        .main-inf {

            background-color: rgb(199, 199, 199);
            height: 50%;

        }


        .tabUser {


            display: flex;



        }

        .divtabUser {
            width: 180px;
            height: 180px;
            background-color: #f0f0f0;
            margin: 3px;
        }

        .divtabUser a p {

            text-align: center;
            margin-top: 50px;


        }

        .divtabUser p {
            text-align: right;
            margin-top: 40px;
            margin-right: 10px;

        }


        /*    */

        .modalContainer {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 200px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modalContainer .modal-content {
            background-color: rgb(244 154 154 / 75%);
            margin: auto;
            padding: 20px;
            border: 1px solid lightgray;
            width: 20%;
            height: 160px;
        }

        .modalContainer .close {
            color: #111111;
            float: right;
            font-size: 25px;
            font-weight: bold;
        }

        .modalContainer .close:hover,
        .modalContainer .close:focus {
            color: rgb(123, 146, 146);
            text-decoration: none;
            cursor: pointer;
        }

        .modalContainer h2 {

            margin-bottom: 20px;
        }


        /*  */
        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: rgba(228, 38, 38, 0.75);
        }

        .header-ul {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            list-style: none;
            margin-right: 4%;
        }

        .header-ul li {
            margin: 12px;
        }

        .header-ul li form label {

            margin-right: 12px;

        }

        .borrar-tablero {

            margin-top: 20px;
        }

        .coleccion-tab {

            background-color: white;
            padding: 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            font-weight: 600;
        }

        .buscador {
            padding: 3px;
        }

        li {
            font-size: 0.8em;
        }

        .buscador input {

            border: none;
            border-radius: 5px;
            padding: 6px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="tvesModal" class="modalContainer">
            <div class="modal-content">
                <span class="close">×</span>
                <h2>nombre del tablero</h2>
                <form action="./index.php?section=nuevo_tablero" method="POST">
                    <input type="hidden" name="action" value="nuevo_tablero">
                    <input type="text" name="nombre_tablero">
                    <button type="submit">Crear</button>
                </form>
                </a>
            </div>
        </div>
        <aside>
            <div class="logo"><i class="fas fa-kaaba fa-2x"></i></div>
            <div class="nav">
                <nav>
                    <ul>
                        <li> <a href="index.php?section=principal">INICIO</a> </li>
                        <li> <a href="#">MIS COSAS </a> </li>
                        <li> <a href="#">TAREAS </a> </li>
                        <li> <a href="#">LISTAS</a> </li>
                        <li> <a href="javascript:addTablero();">CREAR NUEVO TABLERO</a> </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="container-right">
            <header class="header">
                <ul class="header-ul">
                    <li> <a href="index.php?section=principal">INICIO</a> </li>
                    <li> <a href="#">MIS COSAS </a> </li>
                    <li> <a href="#">TAREAS </a> </li>
                    <li> <a href="#">LISTAS</a> </li>
                    <li> <a href="javascript:addTablero();">CREAR NUEVO TABLERO</a> </li>
                    <li>
                        <form action="" class="buscador">
                            <input type="search" name="" id="">
                            <a href="#"><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                </ul>
            </header>
            <main>
                <div class="main-sup">
                    <p class="coleccion-tab">
                        NOTAS
                    </p>
                </div>
                <div class="main-inf">
                    <p class="coleccion-tab">
                        TABLEROS
                    </p>
                    <div class='tabUser'>
                        <?php
                        echo $mostrar_tableros;
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        function addTablero() {
            var modal = document.getElementById("tvesModal");
            var btn = document.getElementsByClassName("btnModal");
            var span = document.getElementsByClassName("close")[0];

            var span1 = document.getElementsByClassName("close")[1];
            var body = document.getElementsByTagName("body")[0];
            var accept = document.getElementById("aceptar");

            modal.style.display = "block";
            body.style.position = "static";
            body.style.height = "100%";
            body.style.overflow = "hidden"

            span.onclick = function() {
                modal.style.display = "none";
                body.style.position = "inherit";
                body.style.height = "auto";
                body.style.overflow = "visible";
            }

            span1.onclick = function() {
                modal.style.display = "none";
                body.style.position = "inherit";
                body.style.height = "auto";
                body.style.overflow = "visible";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    body.style.position = "inherit";
                    body.style.height = "auto";
                    body.style.overflow = "visible";
                }
            }
        }
    </script>
</body>

</html>

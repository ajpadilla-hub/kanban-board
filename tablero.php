<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tablero</title>
    <link rel="stylesheet" href="./assets/css/tablero.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer type="module" src="./assets/js/app.js"></script>
</head>

<body>
    <div class="container">
        <aside>
            <div class="logo">
                <i class="fas fa-kaaba fa-2x"></i>
            </div>
            <div class="nav">
                <nav>
                    <ul>
                    <li> <a href="index.php?section=principal">INICIO</a> </li>
                        <li> <a href="#">MIS COSAS </a> </li>
                        <li> <a href="#">TAREAS </a> </li>
                        <li> <a href="#">LISTAS</a> </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="container-right">
            <header class="menu-nav"> 
                
            <ul class="header-ul">
            <li> <a href="index.php?section=principal">INICIO</a> </li>
                        <li> <a href="#">MIS COSAS </a> </li>
                        <li> <a href="#">TAREAS </a> </li>
                        <li> <a href="#">LISTAS</a> </li>
                    <li>
                        <form action=""  class="buscador">
                            <input type="search" name="" id="">
                            <a><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                </ul>


            </header>
            <main class="tablero">
                <div class="cabeceras">
                    <?php ?>
                    <span>
                        DATOS
                    </span>
                </div>
                <div class="cabeceras">
                    <span>
                        <?php ?> POR HACER
                    </span>
                </div>
                <div class="cabeceras">
                    <?php ?>
                    <span>
                        EN PROGRESO
                    </span>
                </div>
                <div class="cabeceras">
                    <?php ?>
                    <span>
                        FINALIZADO
                    </span>
                </div>


                <div class="col1 columns" id="columna1">
                    <button class="column1 agregar">+ agregar</button>
                    <?php
                        echo $columna1;
                    ?>
                </div>
                <div class="col2 columns" id="columna2">
                    <button class="column2 agregar">+ agregar</button>
                    <?php
                    echo $columna2;
                    ?>
                </div>
                <div class="col3 columns" id="columna3">
                    <button class="column3 agregar">+ agregar</button>
                    <?php
                    echo $columna3;
                    ?>
                </div>
                <div class="col4 columns" id="columna4">
                    <button class="column4 agregar">+ agregar</button>
                    <?php
                    echo $columna4;
                    ?>
                </div>
            </main>
        </div>
    </div>

</body>

</html>
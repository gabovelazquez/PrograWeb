<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda de Camaras </title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="img/icons/favicon.ico" sizes="16x16 24x24 36x36 48x48">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</head>
<body>
<header id="header" class="header  ">
    <div class="container">
        <div class="row">
            <div class="four columns">
                <img src="img/LogoMakr-0teSXg.png" id="logo" width="120" height="90">
            </div>
            
            <div class="two columns u-pull-right">
                <ul>
                    <li class="submenu">
                            <img src="img/car.png" id="img-carrito"width="120" height="90">
                            <div id="carrito">
                                    <p class="vacio">Carrito Vacio</p>
                                    <table id="lista-carrito" class="u-full-width">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cant</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                                    <a  href="info.html" id="comprar" class="button u-full-width">Comprar</a> 
                            </div>
                    </li>
                </ul>
            </div>





        </div> 
    </div>
    </header>


    <div id="hero">
        <div class="container">
            <div class="row">
                    <div class="six columns">
                        <div class="contenido-hero">
                                <h2>Juntos por todo el camino</h2>
                                <p>Las mejores ofertas del año para estrenar</p>
                                <form action="#" id="busqueda" method="post" class="formulario clase2 clase3">
                                    <input class="u-full-width" type="text" placeholder="Buscar producto" id="buscador">
                                    <input type="submit" id="submit-buscador" class="submit-buscador">
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div id="datos" class="box-search"></div>

   <?php
   include_once("Op.php");

//Crear un objeto
$obj = new CarritoCam();


$obj->cargarProductos();
$obj->MostrarProductos();

   ?>

    <footer id="footer" class="footer centrar-texto site-header ">
        <div class="container">
            <div class="row">
                    
                <p>Servicio al cliente.</p>

                <p>Tel: 3531112344</p>
    
                <p>Localidad: Jiquilpan</p>
            </div>
        </div>
    </footer>

    <script src="js/app.js"></script>

</body>
</html>
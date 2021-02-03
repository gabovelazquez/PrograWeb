<?php

class CarritoCam
{
    //Propiedades
    public $productos;//Variable para guardar el arreglo de productos
    public $contador;

    public function _construct()
    {
        $this->productos = array();
        //  $this->contador=0;  //Inicializando el contador
        $contador=0;
    }

    
    //Metodo para cargar productos al arreglo
    public function cargarProductos()
    {
        $this->productos[0][0] = 1;
        $this->productos[0][1] = 'img/cam1.jpg';
        $this->productos[0][2] = 'Camara Ip De Seguridad 360 grados';
        $this->productos[0][3] = 15200;
    
        $this->productos[1][0] = 2;
        $this->productos[1][1] = 'img/cam2.jpeg';
        $this->productos[1][2] = 'Camara De Vigilancia Impermeable';
        $this->productos[1][3] = 12400;

        $this->productos[2][0] = 3;
        $this->productos[2][1] = 'img/cam3.jpeg';
        $this->productos[2][2] = 'Camara De Seguridad Para Exteriores';
        $this->productos[2][3] = 10200;

        $this->productos[3][0] = 4;
        $this->productos[3][1] = 'img/cam5.jpg';
        $this->productos[3][2] = 'Camara De Seguridad Para Exteriores';
        $this->productos[3][3] = 11600;

        $this->productos[4][0] = 5;
        $this->productos[4][1] = 'img/cam6.jpg';
        $this->productos[4][2] = 'Camara De Seguridad Para Exteriores';
        $this->productos[4][3] = 11800;

        $this->productos[5][0] = 6;
        $this->productos[5][1] = 'img/cam7.jpg';
        $this->productos[5][2] = 'Camara De Seguridad Para Exteriores';
        $this->productos[5][3] = 11200;
    }

    //Metodo para mostrar los productos
    public function MostrarProductos()
    {
        $numeroRenglones=count($this->productos)/3; //Numero de renglones
        $numProducto=0;
        echo"<div id='lista-productos' class='container'>
            <h1 id='encabezado' class='encabezado'>Camaras de seguridad en venta</h1>";
        for ($i=0; $i < $numeroRenglones; $i++) {
            echo" <div class='row'>";
            for ($j=0; $j <3 ; $j++) {
                echo" <div class='four columns'>
                        <div class='card'>
                            <img src='".$this->productos[$numProducto][1]."' class='imagen-producto u-full-width'>
                            <div class='info-card'>
                                <h3>".$this->productos[$numProducto][2]."</h3>
                                <p class='precio'>".($this->productos[$numProducto][3]*1.3)."' <span class='u-pull-right '>$".$this->productos[$numProducto][3]."</span></p>
                                <a href='#' class='u-full-width button-primary button input agregar-carrito' data-id=".($this->productos[$numProducto][0]+2)."'>Agregar Al Carrito</a>
                                <a href='Anuncio.html' class='u-full-width button-primary button input ' data-id='".$this->productos[$numProducto][0]."'>Ver producto</a>
                            </div>
                        </div> 
                    </div>";
                $numProducto++;
            }
            echo "</div>";//Div que cierra el renglon
        }
        echo "</div>";
    }

    
 
    public function BuscarProductos($subCadena)
    {
        $numproducto=0;
        $bandera = false; //sirve par encontrar producto
        $respuesta="<div id='lista-productos' class='container'>
        <h1 id='encabezado' class='encabezado' >Las mejores camaras</h1>";
        for ($j=0;$j<6;$j++) {
            if ((stripos($this->productos[$numproducto][2], $subCadena)) !== false) {
                $respuesta.="<div class='four columns'>
                 <div class='card'>
                  <img src='".$this->productos[$numproducto][1]."' class='imagen-producto u-full-width'>
                  <div class='info-card'>
                  <h3>".$this->productos[$numproducto][2]."</h3>
                 <p class='precio'><span class='u-pull-right '>".$this->productos[$numproducto][3]."</span></p>
                 <a href='#' class='u-full-width button-primary button input agregar-carrito' data-id='".$this->productos[$numproducto][0]."'>Agregar Al Carrito</a>
                </div>
                </div>
                </div>";
                $bandera=true;
            }
            $numproducto++;
        }
        if ($bandera == false) {
            $respuesta.= "<br> <br> <h4 class='encabezado'> No existe productos que contengan el texto.". $subCadena ." </h4> </br> </br>";
        }
        return $respuesta;
    }
}

//Variables
const listaProductos = document.querySelector('#datos');
const carrito = document.querySelector('#lista-carrito tbody');
const vaciarCarrito = document.querySelector('#vaciar-carrito');
const letrerocar = document.querySelector('.vacio');
let arregloProductos = [];

//Listeners
cargarEventListeners();

//Funcion de carga de eventos
function cargarEventListeners() {

//Agregar el evento Click al area de productos
listaProductos.addEventListener('click', agregarProducto);

//ESTO NO FUE REALIZADO POR ELL MAESTRO
vaciarCarrito.addEventListener('click', vaciar);

//Agregar el evento click para eliminar los productos del carrito
carrito.addEventListener('click', eliminarProducto);

    //Agregar un evento para cuando se carga la pagina
    document.addEventListener('DOMContentLoaded', () => {
        //Sinccronizar el carrito con LocalStorage
        arregloProductos = JSON.parse(localStorage.getItem('gpoACarrito')) || [];
        //Dibujar el carrito 
        carritoHTML();
        
    });

    
}




//Funcionn para eliminar el producto del carrito
function eliminarProducto(e) {
    e.preventDefault();
    if (e.target.classList.contains('borrar-producto')) {
        //Obtener el ID del producto que se quiere eliminar
        const productoID = e.target.getAttribute('data-id');
        //Eliminar el producto de un arreglo
        arregloProductos = arregloProductos.filter(producto => producto.id !== productoID)
            //Voolver a dibujar el CARRITO
        carritoHTML();
    }
}


//Funcion de agrega el producto al carrito
function agregarProducto(e) {
    e.preventDefault() //No ejecuta nada de lo que ya esta programado
    if (e.target.classList.contains('agregar-carrito')) { //Verificamos que tenga la clase agregar-carrito
        //Obtener el padre de todo el producto
        const productoSeleccionado = e.target.parentElement.parentElement;

        ///Leer los datos del producto seleccionado
        leerDatosProducto(productoSeleccionado);
    }
}

//Función que lea datos del producto seleccionado
function leerDatosProducto(producto) {
    //Crear un objeto con los datos del producto seleccionado
    const infoProducto = {
            imagen: producto.querySelector('img').src, //Selector que apunta a la imagen
            nombre: producto.querySelector('h3').textContent, //Selector que apunta al h4, extrae su contenido
            precio: producto.querySelector('.precio span').textContent, //Selector que apunta a la clase y luego al span, extrae su contenido
            id: producto.querySelector('a').getAttribute('data-id'),
            cantidad: 1
        };
        /* console.log(infoProducto); */
        //Agregar al carrito
    if (arregloProductos.some(prod => prod.id === infoProducto.id)) {
        const productoExistente = arregloProductos.map(p => {
            if (p.id === infoProducto.id) {
                p.cantidad++;
                return p;
            } else
                return p;
        })
        arregloProductos = [...productoExistente];
    } else
        arregloProductos = [...arregloProductos, infoProducto];
    console.log(arregloProductos);
    carritoHTML();
}

function carritoHTML() {
    //limpiar carrito
    limpiarHTML();
    if (arregloProductos.length === 0) {
        letrerocar.innerHTML = 'Sin contenido en el carrito' //cambia el nombre si esta vacio 
    } else {
        letrerocar.innerHTML = 'Contenido del carrito' //cambia el nombre si no esta vacio 
            //recorrer el arreglo de los productos
        arregloProductos.forEach(producto => {
            const renglon = document.createElement('tr'); //crear  elemento o nodo osea un tr
            renglon.innerHTML = `  <td>
        <img src="${producto.imagen}" width=100>
    </td>
    <td>"${producto.nombre}"</td> 
    <td>"${producto.precio}"</td>
    <td>"${producto.cantidad}"</td>
    <td> <label class="borrar-producto" data-id="${producto.id}"> X</label> </td>`;
            carrito.appendChild(renglon); //agrega el nodo html al documento
        });
    }
    //guardar en LocalStorage
    sincronizarConLocalStorage();
}

//Funcion que guarda los datos en Local Storage
function sincronizarConLocalStorage() {
    //Para guardar en Local Stoorage setItem('Identificador, 'valor')
    localStorage.setItem('gpoACarrito', JSON.stringify(arregloProductos));
}

//Limpiar el carrito del HTML que ya contiene 
function limpiarHTML() {
    //Forma lenta de eliminar el HTML
    //carrito.innerHTML=''

    //Forma rapida
    while (carrito.firstChild) {
        carrito.removeChild(carrito.firstChild);
        letrerocar.innerHTML = 'Sin contenido en el carrito'
    }
}

function vaciar() {
    console.log('El carrito se vacio');
    arregloProductos = [];
    sincronizarConLocalStorage();
    limpiarHTML();
}

//Metodo para buscar Productos
$(document).on('keyup', '#buscador', function() {
    var valor = $(this).val();
    if(valor=="")
    listaProductos.innerHTML="";
    else
    buscarPrAJAX(valor);
}); 


   

function buscarPrAJAX(valor){
$.ajax({
   // la URL para la petición
   url : 'busqueda.php',

   // la información a enviar
   // (también es posible utilizar una cadena de datos)
   data : { id : valor },

   // especifica si será una petición POST o GET
   type : 'POST',

   // el tipo de información que se espera de respuesta
   dataType : 'text',

   // código a ejecutar si la petición es satisfactoria;
   // la respuesta es pasada como argumento a la función
   success : function(text) {
     listaProductos.innerHTML=text;
   },

   // código a ejecutar si la petición falla;
   // son pasados como argumentos a la función
   // el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
   // de la petición y un texto con la descripción del error que haya dado el servidor
   error : function(jqXHR, status, error) {
       alert('Disculpe, existió un problema');
   },

   // código a ejecutar sin importar si la petición falló o no
   complete : function(jqXHR, status) {
     
   }
});
}
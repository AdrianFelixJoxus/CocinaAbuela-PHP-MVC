// document.addEventListener("DOMContentLoaded",function() {
//     iniciarApp();
// });


// function iniciarApp() {

//     consultarAPI();// Consulta la API en el backend de PHP
// }

// async function consultarAPI() {
//     try {
//         const url = "http://localhost:3000/api/productos";
//         const resultado = await fetch(url);
//         const productos = await resultado.json();
//         mostrarProductos(productos);
//     } catch (error) {
//         console.log(error);
//     }
// }

// function mostrarProductos(productos){ 

//    productos.forEach(producto => {
//     const {id,nombre,precio,codigo} = producto;
    

//     const BtnDeleteProd = document.createElement("input");
//     BtnDeleteProd.classList.add("boton-rojo-admin");
//     BtnDeleteProd.value = "Eliminar";
//     BtnDeleteProd.type = "button";
//     BtnDeleteProd.onclick = function() {
//         deleteProducto(producto); 
//     }

//     const BtnDeleteProdHidden = document.createElement("INPUT");
//     BtnDeleteProdHidden.type = "hidden";
//     BtnDeleteProdHidden.value = id;
//     BtnDeleteProdHidden.dataset.idProducto = id;
    

//     const BtnUpdateProd = document.createElement("a");
//     BtnUpdateProd.classList.add("boton-amarillo-admin");
//     BtnUpdateProd.textContent = "Actualizar";
//     BtnUpdateProd.href = "#";

//     const formularioDeleteProd = document.createElement("form");
//     formularioDeleteProd.classList.add("acciones-producto");
//     formularioDeleteProd.appendChild(BtnDeleteProdHidden);
//     formularioDeleteProd.appendChild(BtnDeleteProd);
//     formularioDeleteProd.appendChild(BtnUpdateProd);

//     const accionesProducto = document.createElement("TD");
//     accionesProducto.classList.add("acciones-producto");

//     accionesProducto.appendChild(formularioDeleteProd);
    
//     // accionesProducto.appendChild(BtnDeleteProd);
//     // accionesProducto.appendChild(BtnUpdateProd);

//     const idProducto = document.createElement("TD");
//     idProducto.classList.add("id-producto");
//     idProducto.textContent = id;

//     const nombreProducto = document.createElement("TD");
//     nombreProducto.classList.add("nombre-producto");
//     nombreProducto.textContent = nombre;

//     const precioProducto = document.createElement("TD");
//     precioProducto.classList.add("precio-producto");
//     precioProducto.textContent = `$${precio}`;

//     const codigoProducto = document.createElement("TD");
//     codigoProducto.classList.add("codigo-producto");
//     codigoProducto.textContent = codigo;

//     const productoTbody = document.createElement("TBODY");
//     productoTbody.classList.add("producto");
    
//     productoTbody.appendChild(idProducto);
//     productoTbody.appendChild(nombreProducto);
//     productoTbody.appendChild(precioProducto);
//     productoTbody.appendChild(codigoProducto);
//     productoTbody.appendChild(accionesProducto);
   

//     document.querySelector("#productos").appendChild(productoTbody);
//    });
// }

// function deleteProducto(producto) {
// const {id} = producto; // id del producto

// // Identificar el elemento al que se le da click
// const btnProducto = document.querySelector(`[data-id-producto="${id}"]`);

// console.log(btnProducto);
// }


let paso = 1;

const pasoInicial = 1;
const pasoFinal = 5;

let paso2 = 1;

let categoria = 1;
let containerId = "";

const categorias = ["1","2","3"];


const orden = {
    id: "",
    nombre: "",
    fecha: "",
    hora: "",
    mesa: "",
    productos: []
}

document.addEventListener("DOMContentLoaded",function(){
    iniciarapp();
});
    
    function iniciarapp() {
        eventListeners();

        mostrarSeccion();
        tabs();
     
        mostrarsubSeccion();
        subtabs();
        

        //consultarApi(); // Consulta la API en el backend de PHP

        consultarDesayunos();
        consultarBebidas();
        consultarComidas();
        consultarMesas();

        idUsuario(); // Agrega el id del cliente al objeto de la orden
        nombreUsuario();
        fechaOrden();
        horaOrden();
        mesaOrden();
        mostrarResumen();

        
        
    }


function mostrarSeccion() {

    //Elimina la seccion anterior
    const seccionAnterior = document.querySelector(".mostrar");
    if(seccionAnterior) {
        seccionAnterior.classList.remove("mostrar");
    }

    // Seleccionar la seccion con el paso
    const pasoSelector = `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add("mostrar");


     // Quita la clase de actual al tab anterior
     const tabAnterior = document.querySelector(".actual");
     if(tabAnterior) {
         tabAnterior.classList.remove("actual");
     }
 
     // Resalta el tab actual
     const tab = document.querySelector(`[data-paso="${paso}"]`);
     tab.classList.add("actual");

     
}


function mostrarsubSeccion() {

    //Elimina la seccion anterior
    const subSeccionAnterior = document.querySelector(".subMostrar");
    if(subSeccionAnterior) {
        subSeccionAnterior.classList.remove("subMostrar");
    }

    // Seleccionar la seccion con el paso
    const pasoSelector = `#paso2-${paso2}`;
    
    const subSeccion = document.querySelector(pasoSelector);
    subSeccion.classList.add("subMostrar");
    

     // Quita la clase de actual al tab anterior
     const tabAnterior = document.querySelector(".subActual");
     console.log(tabAnterior);
     if(tabAnterior) {
         tabAnterior.classList.remove("subActual");
     }
 
     // Resalta el tab actual
     const tab = document.querySelector(`[data-subpaso="${paso2}"]`);
     tab.classList.add("subActual");
     
}



function tabs() {
    const botones = document.querySelectorAll(".tabs button");
    
    botones.forEach(boton => {
        boton.addEventListener("click",function(e) {
          paso = parseInt(e.target.dataset.paso);
        
          mostrarSeccion();
        //   mostrarResumen();
        });
    })
}

function subtabs() {
    const botones = document.querySelectorAll(".tabsSubcategorias button");
    
    botones.forEach(boton => {
        boton.addEventListener("click",function(e) {
            
          paso2 = parseInt(e.target.dataset.subpaso);
          
          mostrarsubSeccion();
            
        });
    })
}



// async function consultarApi() {

  
//     try {
//         const url = "http://localhost:3000/api/filter-todos";
//         res = await fetch(url);
//         const productos = await res.json();
  
        
//         
//         FiltrarYmostrar(productos);
    
//         
//     } catch (error) {
//         console.log(error);
//     }


// }

async function consultarDesayunos() {
    
        const url = `${location.origin}/api/filtrar-huevos`;
        const url2 = `${location.origin}/api/filtrar-omelettes`;
        const url3 = `${location.origin}/api/filtrar-hotcakes`;
        const url4 = `${location.origin}/api/filtrar-otros`;
        const url5 = `${location.origin}/api/filtrar-ninos`;
        
        try {

        const [res,res2,res3,res4,res5] = await Promise.allSettled([
            fetch(url).then(res => res.ok ? res : Promise.reject({status: res.status, statusText: res.statusText})),
            fetch(url2).then(res => res.ok ? res : Promise.reject({status: res.status, statusText: res.statusText})),
            fetch(url3).then(res => res.ok ? res : Promise.reject({status: res.status, statusText: res.statusText})),
            fetch(url4).then(res => res.ok ? res : Promise.reject({status: res.status, statusText: res.statusText})),
            fetch(url5).then(res => res.ok ? res : Promise.reject({status: res.status, statusText: res.statusText}))
        
        ]);
        
        // verificar si alguna promesa ha fallado
        const promesasFallo = [res,res2,res3,res4,res5].filter(resultado => resultado.status === "rejected");

        if (promesasFallo.length > 0) {
            promesasFallo.forEach(fallo => {
                console.error(`Petición fallida: ${fallo.reason.status} - ${fallo.reason.statusText}`);
            });
            return;
        }


        // continua si no hay ningun fallo
        const [huevos,omelettes,hotcakes,otros,niños] = await Promise.all([
            res.value.json(),
            res2.value.json(),
            res3.value.json(),
            res4.value.json(),
            res5.value.json()
        ]);


        filtrarProductos(huevos, "#Huevos");
        filtrarProductos(omelettes, "#Omelettes");
        filtrarProductos(hotcakes, "#Hotcakes");
        filtrarProductos(otros, "#Otros");
        filtrarProductos(niños, "#Niños");

        
    } catch (error) {
        console.log("Error al consultar desayunos: ",error);
    }
 
}

async function consultarBebidas() {
    
        const url = `${location.origin}/api/filtrar-calientes`;
        const url2 = `${location.origin}/api/filtrar-frias`;
        
        
        const [res,res2] = await Promise.allSettled([fetch(url),fetch(url2)]);
        
        // verificar si alguna promesa ha fallado
        const promesasFallo = [res,res2].filter(resultado => resultado.status === "rejected");

        if(promesasFallo.length >0) {
            console.error('Al menos una peticion falló:', promesasFallo);
            return;
        }

        // continua si no hay ningun fallo
        const [calientes,frias] = await Promise.all([
            res.value.json(),
            res2.value.json(),
           
        ]);


        filtrarProductos(calientes, "#bebidasCalientes");
        filtrarProductos(frias, "#bebidasFrias");
     
 
}

async function consultarComidas() {
    
    const url = `${location.origin}/api/filtrar-carta`;
    const url2 = `${location.origin}/api/filtrar-tortas`;
    const url3 = `${location.origin}/api/filtrar-antojitos`;

    
    
    const [res,res2,res3] = await Promise.allSettled([fetch(url),fetch(url2),fetch(url3)]);
    
    // verificar si alguna promesa ha fallado
    const promesasFallo = [res,res2,res3].filter(resultado => resultado.status === "rejected");

    if(promesasFallo.length >0) {
        console.error('Al menos una peticion falló:', promesasFallo);
        return;
    }

    // continua si no hay ningun fallo
    const [carta,tortas,antojitos] = await Promise.all([
        res.value.json(),
        res2.value.json(),
        res3.value.json()
       
    ]);


    filtrarProductos(carta, "#carta");
    filtrarProductos(tortas, "#tortas");
    filtrarProductos(antojitos, "#antojitos");
 

}

async function consultarMesas() {
    const url = `${location.origin}/api/mesas`;
    const respuesta = await fetch(url);
    const resultado = await respuesta.json();
    
    
}

function createProductoElement(producto,containerId) {
    
        const {id,nombre,precio} = producto; // destructuring

        const nombreProducto = document.createElement("P");
        nombreProducto.classList.add("nombre-producto");
        nombreProducto.textContent = nombre;


        const precioProducto = document.createElement("P");
        precioProducto.classList.add("precio-producto");
        precioProducto.textContent = `$${precio}`


        const cantidadInput = document.createElement("input");
        cantidadInput.classList.add("cantidad-producto");
        cantidadInput.setAttribute("type", "number");
        cantidadInput.setAttribute("min", "1");
        cantidadInput.setAttribute("value", "1");

        

        cantidadInput.addEventListener("input", function() {
            actualizarCantidad(producto, cantidadInput);
            mostrarResumen();

        });
        

        const productoDiv = document.createElement("DIV");
        productoDiv.classList.add("producto");
        productoDiv.dataset.idProducto = id;// id del div del producto
        productoDiv.onclick = function(e) {
            if(e.target !== cantidadInput) {
                seleccionarProducto(producto,cantidadInput.value);
                mostrarResumen();
            }
            
        }

 



        productoDiv.appendChild(nombreProducto);
        productoDiv.appendChild(precioProducto);
        productoDiv.appendChild(cantidadInput);


        document.querySelector(containerId).appendChild(productoDiv);
        
       
    
}


function filtrarProductos(productos,contenedorId) {
    productos.forEach(producto => {
        createProductoElement(producto, contenedorId);
    });
}




function seleccionarProducto(producto,cantidad) {
    const {id} = producto;
    const {productos} = orden

    // Identificar el elemento al que se le da click
    const divProducto = document.querySelector(`[data-id-producto="${id}"]`);

    // Comprobar si un producto ya fue agregado
    if(productos.some(agregado => agregado.id === id)) {
        //Eliminar el producto
        orden.productos = productos.filter(agregado => agregado.id !== id );
        divProducto.classList.remove("seleccionado");
    }
    else if(!isNaN(parseInt(cantidad))) {
        // Si el campo esta vacio no inserta
         // agregar el producto
         if(parseInt(cantidad) !== 0) {
            orden.productos = [...productos, { ...producto, cantidad: parseInt(cantidad) }];
            divProducto.classList.add("seleccionado");
         }
    }
   
    

    //console.log(orden);
    
}

function eliminarProducto(producto) {
    const {id} = producto;
    const {productos} = orden

    // Identificar el elemento al que se le da click
    const divProducto = document.querySelector(`[data-id-producto="${id}"]`);

    // Comprobar si un producto ya fue agregado
    if(productos.some(agregado => agregado.id === id)) {
        //Eliminar el producto
        orden.productos = productos.filter(agregado => agregado.id !== id );
        divProducto.classList.remove("seleccionado");
    }
}

function actualizarCantidad(producto, cantidadInput) {
    const { id } = producto;
    const { productos } = orden;
   
    const nuevaCantidad = parseInt(cantidadInput.value);
    if(nuevaCantidad !== 0) {
        // Actualizar la cantidad del producto
        orden.productos = productos.map(p => (p.id === id ? { ...p, cantidad: nuevaCantidad } : p));
    }else {
        orden.productos = productos.map(p => (p.id === id ? { ...p, cantidad: 1 } : p));
    }

    
    
}


function ordenComentario(comentario,producto) {
  const {id} = producto;
  const {productos} = orden
  
  const com = comentario.value;

  if(com.value !== "") {
    orden.productos = productos.map(p => (p.id === id ? { ...p, comentario: com } : p));
    console.log(orden.productos);
  }else {
    orden.productos = productos.map(p => (p.id === id ? { ...p, comentario: "None" } : p));
  }
  
}

function idUsuario() {
    const id = document.querySelector("#id").value
    orden.id = id;
}

function nombreUsuario() {
    const nombre = document.querySelector("#nombre").value;
    orden.nombre = nombre;
}

function fechaOrden() {
     //const fecha = document.querySelector("#fecha").value;
    // orden.fecha = fecha;
    const f = new Date();
    const year = f.getFullYear();
    const month = f.getMonth() + 1;
    const day = f.getDate();
    //Formatear hora y mes para poder ser insertado en la base de datos
    let temp = (day < 10 ? "0" : "0") + day;
    let temp2 = (month < 10 ? "0" : "0") + month

    const FechaHoy = `${year}-${temp2}-${temp}`;
    orden.fecha = FechaHoy;
    
}

function mesaOrden() {
    const mesaNum = document.querySelector("#mesa").value
    orden.mesa = parseInt(mesaNum);
}



function horaOrden() {
    // const hora = document.querySelector("#hora");

    const hr = new Date();
    const horasHoy = hr.getHours();
    const minutosHoy = hr.getMinutes();
    const segudosHoy = hr.getSeconds();
    const hora = `${horasHoy}:${minutosHoy}:${segudosHoy}`;
    const horaReal = hora.split(",");
    orden.hora = horaReal;
    // const horaHoy = hr.toLocaleTimeString("en-US")
    // orden.hora = horaHoy;

}



function mostrarResumen() {
    const resumen = document.querySelector(".contenido-resumen");

    // Limpiar el contenido de Resumen
    while(resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }
    
    
    if(Object.values(orden).includes("") || orden.productos.length === 0) {
        mostrarAlerta("hacen falta agregar productos","error",".contenido-resumen",false);
        return;
    }

    // Formatear div de productos
    const {productos} = orden;
    

    const headingProductos = document.createElement("H3");
    headingProductos.textContent = "Resumen de Productos";
    headingProductos.classList.add("tituloResumen");
    resumen.appendChild(headingProductos);

    const barra = document.createElement("DIV");
    barra.classList.add("contenedor-barra");

    const barraNombre = document.createElement("P");
    barraNombre.textContent = "Articulo";
    barraNombre.classList.add("Articulo");

    const barraComentario = document.createElement("P");
    barraComentario.textContent = "Comentario";
    
    // const barraPrecio = document.createElement("P");
    // barraPrecio.textContent = "Precio";

    const barraCantidad = document.createElement("P");
    barraCantidad.textContent = "Cant";

    // const barraImporte = document.createElement("P");
    // barraImporte.textContent = "Importe";

    const barraAccion = document.createElement("img");
    barraAccion.src = "/build/img/gorro-de-cocinero.png";
    barraAccion.classList.add("orden-formato-imagen");


  
    barra.appendChild(barraCantidad);
    barra.appendChild(barraNombre);
    //barra.appendChild(barraPrecio);
    //barra.appendChild(barraImporte);
    barra.appendChild(barraComentario);
    barra.appendChild(barraAccion);

    
    resumen.appendChild(barra);

    

    let total = 0;
    productos.forEach(producto => { 
        const {precio,nombre,cantidad,id} = producto
        

        const precioProductoFormateado = parseInt(precio);
        const importe = precioProductoFormateado * cantidad;
                 
         total += importe;

        const contenedorProducto = document.createElement("DIV");
        contenedorProducto.classList.add("contenedor-producto");

        const nombreProducto = document.createElement("P");
        nombreProducto.textContent = nombre;
        nombreProducto.classList.add("Articulo")

        // const precioProducto = document.createElement("P");
        // precioProducto.innerHTML = `$${precio}`;

        const cantidadProducto = document.createElement("P");
        cantidadProducto.innerHTML = ` ${cantidad}`;

        const comentarioProducto = document.createElement("INPUT");
        comentarioProducto.classList.add("orden-formato-comentario");
        comentarioProducto.id = "comentario";
        comentarioProducto.addEventListener("input", function() {
            ordenComentario(comentarioProducto,producto);
    
        });
        
        // const importeProducto = document.createElement("P");
        // importeProducto.innerHTML = `${importe}`;

        const botonEliminar = document.createElement("BUTTON");
        botonEliminar.type = "button";
        botonEliminar.classList.add("botonEliminar");
        botonEliminar.textContent = "X";
        botonEliminar.value = id;
        botonEliminar.onclick = function() {
            
                eliminarProducto(producto);
                mostrarResumen();
        }
        

        contenedorProducto.appendChild(cantidadProducto);
        contenedorProducto.appendChild(nombreProducto);
        //contenedorProducto.appendChild(precioProducto);
        //contenedorProducto.appendChild(importeProducto);
        contenedorProducto.appendChild(comentarioProducto)
        contenedorProducto.appendChild(botonEliminar);
        
        

        resumen.appendChild(contenedorProducto);
        
      
        
    });

    const contenedorTotal = document.createElement("DIV");
    contenedorTotal.classList.add("total-producto");

    const totalProducto = document.createElement("P");
    totalProducto.innerHTML = `Total: $${total}`;

    const botonOrdenar = document.createElement("BUTTON");
    botonOrdenar.classList.add("boton");
    botonOrdenar.textContent = "Ordenar";
    botonOrdenar.onclick = ordenar;


    contenedorTotal.appendChild(botonOrdenar);
    contenedorTotal.appendChild(totalProducto);
    resumen.appendChild(contenedorTotal);



    
    

    // const inputComentario = document.createElement("textarea");
    // inputComentario.classList.add("input-comentario");
    // inputComentario.placeholder = "Agrega un comentario";
    // resumen.appendChild(inputComentario);

    
    
    
}




async function ordenar() {
    const {nombre,fecha,hora,productos,id,mesa} = orden;
    

    const idProductos = productos.map(producto => producto.id);
    const cantidadProd = productos.map(producto => producto.cantidad);
    const comentarioProd = productos.map(producto => producto.comentario);
    
      //Cuerpo del metodo post este es el submit pero en fetch
      const datos = new FormData();
      datos.append("fecha",fecha);
      datos.append("hora",hora);
      datos.append("usuarioId",id);
      datos.append("mesaId",mesa);
      datos.append("productos",idProductos);
      datos.append("cantidades",cantidadProd);
      datos.append("comentarios",comentarioProd);
      datos.append("nombre",nombre);
     
      console.log([...datos]);
    
      
      
      try {
        //peticion hacia la api
        const url = `${location.origin}/api/ordenes`;

        // respuesta para tipo post
        const respuesta = await fetch(url, {
           method: "POST",
           body: datos
        });

        const resultado =  await respuesta.json();
        
        if(resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Orden Creada',
                text: 'Tu Orden fue creada correctamente',
                button: "OK"
            }).then( () => {
                setTimeout(() => {
                    // window.location.reload();
                    window.location.href = `${location.origin}/mesas`;
                }, 500);
                
            });
        }
      } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'Hubo un error al guardar la Orden',
        })
      }

}

function mostrarAlerta(mensaje,tipo,elemento,desaparece = true) {

    // Previene que se genere mas de una alerta
    const alertaPrevia = document.querySelector(".alerta");
    if(alertaPrevia) {
        alertaPrevia.remove();
    }

    // scripting para generar una alerta
    const alerta = document.createElement("DIV");
    alerta.textContent = mensaje;
    alerta.classList.add("alerta");
    alerta.classList.add(tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if(desaparece) {
        // Remover alerta
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
    
}







function eventListeners() {
        
const alerta = document.querySelector(".alerta");
    console.log(alerta);

setTimeout(() => {
    alerta.remove();
    
}, 3000);
    
}

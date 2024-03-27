

document.addEventListener("DOMContentLoaded",function(){
    iniciarApp();
});

function iniciarApp() {
    botonesCobro();
}

botonClick = 0;

function botonesCobro() {
    const botones = document.querySelectorAll("#contenedorCobro .boton");

    
    botones.forEach(boton => {
        boton.addEventListener("click",function(e) {
            Cobro(e.target.id);
        });
    })
}

function Cobro(id) {
  
    const input = document.querySelector(".inputCobro");
    const botonTarjeta = document.querySelector("#tarjeta");
    const botonEfectivo = document.querySelector("#efectivo");
    const totalApariencia = document.querySelector("#total");
    const inputEfectivo = document.querySelector("#totalefectivo");
    const inputCobro = document.querySelector(".inputCobro");

    const titulo = document.querySelector("#titulo");
    const venta = document.querySelector("#venta");
    const header = document.querySelector("#header");
    const ticket = document.querySelector("#ticket");
    
    
    
    const cambio = document.createElement("p");
    const residuo = document.querySelector("#cambio");
    
    

    let tarjeta = parseInt(inputEfectivo.value);
    let Efectivo = parseInt(inputEfectivo.value);

    let importe;

    input.id = "";

    if(id === "efectivo") {
        residuo.textContent = "";
        input.id = "1";
        input.placeholder='Efectivo';
        botonTarjeta.classList.remove("boton-verde");
        botonEfectivo.classList.add("boton-verde");

        const totalEfectivo = Efectivo;
        totalApariencia.textContent = totalEfectivo;
        importe = totalEfectivo;
        
        
    }

    if(id === "tarjeta") {
        input.id = "2";
        input.placeholder='Tarjeta';
        botonTarjeta.classList.add("boton-verde");
        botonEfectivo.classList.remove("boton-verde");

        const iva = tarjeta * .04;
        const TotalTarjeta = tarjeta + iva;

        totalApariencia.textContent = TotalTarjeta;
        importe = TotalTarjeta;

        cambio.textContent = importe - parseInt(inputCobro.value)
        residuo.appendChild(cambio);
    }

    
    if(parseInt(inputCobro.value) < importe || inputCobro.value === "") {
        mostrarAlerta("El importe es menor a total","error","#contenedorCobro",true);
        return;
    }

    cambio.textContent = importe - parseInt(inputCobro.value);
    let a = cambio.textContent;
    let b = a.slice(1); // borrar el signo negativo con slice (1) elimina el primer elemento
    cambio.textContent = b;
    residuo.appendChild(cambio);
    console.log(b);

    
    
    

    titulo.classList.add("ocultar");
    venta.classList.add("ocultar");
    header.classList.add("ocultar");
    ticket.classList.remove("ocultar");


    generarCobro();
    
    



}


async function eliminarVenta() {
    const folio = document.querySelector("#folio");
    const idVendedor = document.querySelector("#idVendedor");
    
    const datos = new FormData();
    datos.append("id",folio.textContent);
    datos.append("usuarioId",idVendedor.value);

    try {
        // peticion api
        const url = `${location.origin}/api/eliminarVenta`;

        // respuestas tipo post
        const respuesta = await fetch(url, {
            method: "POST",
            body: datos
        });

        const resultado = await respuesta.json();

        if(resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Venta Generada',
                text: 'Tu Venta fue creada correctamente',
                button: "OK"
            }).then( () => {
                setTimeout(() => {
                    // window.location.reload();
                    window.location.href = `${location.origin}/ventas`;
                }, 500);
                
            });
        }
    } catch(error) {
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'Hubo un error al generar la Venta',
        })
    }

}




function generarCobro() {
    
   
    window.print();
    eliminarVenta();
    // window.print();
    // setTimeout(() => {
    //      window.location.href = "http://localhost:3000/ventas";
    //  }, 3000);
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
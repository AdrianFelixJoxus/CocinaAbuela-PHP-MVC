document.addEventListener("DOMContentLoaded",function() {
    iniciarApp();
})

function iniciarApp() {
    buscarPorFecha();
    Orden();
}

function buscarPorFecha() {
    const fechainput = document.querySelector("#fecha");
    fechainput.addEventListener("input",function(e) {
        const fechaSeleccionada = e.target.value;

        window.location = `?fecha=${fechaSeleccionada}`;
    })
}

function Orden() {
       const botonListo = document.querySelector("#listo");
       botonListo.addEventListener("click",eliminarOrden)

}



async function eliminarOrden() {
    const ordenId = document.querySelector("#ordenId");
    console.log(ordenId.value);

    const datos = new FormData();
    datos.append("id",ordenId.value);

    try {
        //peticion api
        const url = `${location.origin}/api/eliminarOrden`;

        // respuesta Post
        const respuesta = await fetch(url, {
           method: "POST",
           body: datos 
        });

        const resultado = await respuesta.json();

        if(resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Orden Lista',
                text: 'Tu Orden ha sido completada correctamente',
                button: "OK"
            }).then( () => {
                setTimeout(() => {
                    // window.location.reload();
                    window.location.href = `${location.origin}/ordenes`;
                }, 1000);
                
            });
        }
    } catch(error) {
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: 'Hubo un error al generar la Orden',
        })
    }


}
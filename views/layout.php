<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocina abuela</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <div id="header">
    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/"><h1>Cocina de la Abuela</h1></a>

                <div class="navegacion-flex">

                    <a href="#">
                        <img class="imgLogo" src="/build/img/gorro-de-cocinero.png" alt="Logotipo de Casa Abuela">
                    </a>

                    <nav class="navegacion">

                    
                        <a href="/admin-productos">Administrador</a>
                        <a href="/mesas">Venta</a>
                        <a href="/admin/usuarios">Usuarios</a>
    

                        <?php if(isset($_SESSION["admin"]) || isset($_SESSION["cajero"]) || isset($_SESSION["mesero"])){ ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php } ?>
                    </nav>
                    
                </div>

                
            </div>
        </div>
    </header>
    </div>


    

    <div class="contenedor-app">
        <!-- <div class="contenido-resumen"></div> -->
        <div class="app">
        <?php echo $contenido ?>
        </div>
        
    </div>

    


    <?php
        echo $script ?? "";
    ?>
    </body>
</html>
            
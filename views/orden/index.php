


<div class="orden" id="app">

<div class="contenido-resumen">

</div>

<div class="contenido-orden">
<!-- <h1 class="nombre-pagina">Nueva Orden</h1>
<p class="descripcion-pagina">Elige tus Productos</p> -->

    <nav class="tabs">
        <button class="actual"  type="button" data-paso="1">Desayunos</button>
        <button  type="button" data-paso="2">Bebidas</button>
        <button  type="button" data-paso="3">Comidas</button>
        
    </nav>

    

    <div id="paso-1" class="seccion">
        <!-- <p class="text-center">Filtrar Productos</p>
        <input name="search" placeholder="Buscar Productos" class="input" id="busqueda" type="text"> -->
        <nav class="tabsSubcategorias">

            <button type="button" data-subpaso="1">Huevos</button>
            <button type="button" data-subpaso="2">Omelettes</button>
            <button type="button" data-subpaso="3">Hot cakes</button>
            <button type="button" data-subpaso="4">Otros</button>
            <button type="button" data-subpaso="5">Menu niños</button>

        </nav>

        <div id="paso2-1" class="seccion2">

            <h2>Seccion Huevos</h2>

            <div id="Huevos" class="listado-productos"></div>

        </div>

        <div id="paso2-2" class="seccion2">

            <h2>Seccion Omelettes</h2>

            <div id="Omelettes" class="listado-productos"></div>
        </div>

        <div id="paso2-3" class="seccion2">

            <h2>Seccion Hot Cakes</h2>

            <div id="Hotcakes" class="listado-productos"></div>
        </div>

        <div id="paso2-4" class="seccion2">

            <h2>Seccion Otros</h2>

            <div id="Otros" class="listado-productos"></div>
        </div>

        <div id="paso2-5" class="seccion2">

            <h2>Seccion Niños</h2>

            <div id="Niños" class="listado-productos"></div>
        </div>
    

    </div>

    <div id="paso-2" class="seccion">
        <!-- <p class="text-center">Filtrar Productos</p>
        <input name="search" placeholder="Buscar Productos" class="input" id="busqueda" type="text"> -->
        <nav class="tabsSubcategorias">
            <button type="button" data-subpaso="6">Calientes</button>
            <button type="button" data-subpaso="7">Frias</button>
        </nav>

        <div id="paso2-6" class="seccion2">

            <h2>Seccion Bebidas Calientes</h2>

            <div id="bebidasCalientes" class="listado-productos"></div>
        </div>

        <div id="paso2-7" class="seccion2">

            <h2>Seccion Bebidas Frias</h2>

            <div id="bebidasFrias" class="listado-productos"></div>
        </div>

        
        
    </div>

    <div id="paso-3" class="seccion">
        <!-- <h2>Productos</h2>
        <p class="text-center">Elige tus productos a continuacion</p> -->
        <!-- <p class="text-center">Filtrar Productos</p>
        <input name="search" placeholder="Buscar Productos" class="input" id="busqueda" type="text"> -->
        <nav class="tabsSubcategorias">
            <button type="button" data-subpaso="8">A la carta</button>
            <button type="button" data-subpaso="9">Tortas</button>
            <button type="button" data-subpaso="10">Antojitos Mexicanos</button>
        </nav>

        <div id="paso2-8" class="seccion2">

            <h2>Seccion A la Carta</h2>

            <div id="carta" class="listado-productos"></div>
        </div>

        <div id="paso2-9" class="seccion2">

            <h2>Seccion Tortas</h2>

            <div id="tortas" class="listado-productos"></div>
        </div>

        <div id="paso2-10" class="seccion2">

            <h2>Seccion Antojitos Mexicanos</h2>

            <div id="antojitos" class="listado-productos"></div>
        </div>

    </div>

    <div id="paso-4" class="seccion">
        <div id="mesas"></div>
    </div>

    <div class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la informacion sea correcta</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input
                id="nombre" 
                type="text"
                placeholder="Tu nombre"
                value="<?php echo s($nombre);?>"
                disabled = "disable"   
                >
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input
                id="fecha" 
                type="date"
                value="<?php echo date("Y-m-d");?>"
                disabled = "disable"       
                >
            </div>
    
            <div class="campo">
                <label for="Hora">Hora</label>
                <input
                id="hora" 
                type="time"
                    
                >
            </div>

            <div class="campo">
                <label for="Mesa">Mesa</label>
                <input
                id="mesa" 
                type="text"
                disabled = "disable" 
                value="<?php echo $_GET["mesa"] ?>"
                >
            </div>
            <input type="hidden" id="id" value="<?php echo s($id); ?>">

        </form>
    </div>

    <div id="paso-5" class="seccion">
        

        
    </div>

    

   


</div>

</div>




<?php 
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    "

?>
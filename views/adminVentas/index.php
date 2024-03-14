<h1 class="nombre-pagina">Panel de Ventas</h1>

<?php include_once __DIR__ . "/../templates/barra.php"; ?>

<h2>Buscar Ventas</h2>

<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
            type="date"
            id="fecha"
            name="fecha"
            value="<?php echo s($fecha) ?>"
            >
        </div>
    </form>
</div>

<?php 
    if(count($ventas) === 0) {
        echo "<h2>No hay ordenes en esta fecha</h2>";
    }
?>

<div class="ordenes-admin">
    <ul class="ordenes">
        <?php
        $idVenta = 0;
        foreach($ventas as $key => $venta){
           if($idVenta !== $venta->folio) {
            //$total = 0;
           ?>
        <li class="admin-ordenes">
            <div class="datos-admin">
            <p>Folio: <span class="producto"><?php echo $venta->folio; ?></span></p>
            <p>Orden: <span class="producto"><?php echo $venta->orden; ?></span></p>
            <p>Fecha: <span class="producto"><?php echo $venta->fecha; ?></span></p>
            <p>Hora: <span class="producto"><?php echo $venta->hora; ?></span></p>
            <p>Mesa: <span class="producto"><?php echo $venta->mesa; ?></span></p>
            <p>Mesero: <span class="producto"><?php echo $venta->mesero; ?></span></p>
            </div>

            <!-- <h3>Productos</h3> -->
            

           <?php
           $idVenta = $venta->folio; 
            } // Fin if
            $total += $venta->precio * $venta->cantidad;
            ?>
            <!-- <div class="admin-header">
            <div class="header-productos">
                <p>Cantidad</p>
                <p>Producto</p>
            </div>
            
            <div class="admin-productos">
                <span><?php //echo $venta->cantidad; ?></span>
                <span><?php //echo $venta->nombre; ?></span>
            </div>
            </div> -->
            
                

    <?php
    
        $actual = $venta->folio;
        $proximo = $ventas[$key + 1]->folio ?? 0; // proximo elemento
       
        if(esUltimo($actual,$proximo)) { ?>
             <!-- <p class="total">Total: <span><?php //echo $total; ?> </span></p> -->

            
        <form action="/venta" method="POST"> 
            <input type="hidden" name="ventaId" value="<?php echo $venta->folio; ?>">
            <input type="submit" class="boton" value="Generar Venta">
        </form>
            
    <?php }
        } // fin foreach?>
        
        
    </ul>
</div>

<?php
    $script = "<script src='build/js/buscadorVentas.js'></script>
    "
    
?>
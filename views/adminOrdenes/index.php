<h1 class="nombre-pagina">Panel de Ordenes</h1>

<a href="/admin-productos" class="boton">volver</a>
<?php include_once __DIR__ . "/../templates/barra.php"; ?>

<h2>Buscar Ordenes</h2>

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
    if(count($ordenes) === 0) {
        echo "<h2>No hay ordenes en esta fecha</h2>";
    }
?>

<div class="ordenes-admin">
    <ul class="ordenes">
        <?php
        $idOrden = 0;
        foreach($ordenes as $key => $orden){
           if($idOrden !== $orden->id) {
            //$total = 0;
           ?>
        <li class="admin-ordenes">
            <div class="datos-admin">
            <p>Orden: <span class="producto"><?php echo $orden->id; ?></span></p>
            <p>Fecha: <span class="producto"><?php echo $orden->fecha; ?></span></p>
            <p>Hora: <span class="producto"><?php echo $orden->hora; ?></span></p>
            <p>Mesa: <span class="producto"><?php echo $orden->mesaId; ?></span></p>
            <p>Vendedor: <span class="producto"><?php echo $orden->usuario; ?></span></p>
            </div>

            <!-- <h3>Productos</h3> -->
            

           <?php
           $idOrden = $orden->id; 
            } // Fin if
            //$total += $orden->precio * $orden->Cantidad;
            ?>
            <div class="admin-header">
            <div class="header-productos">
                <p>Cantidad</p>
                <p>Producto</p>
                <p>Comentario</p>
            </div>
            
            <div class="admin-productos">
                <span><?php echo $orden->Cantidad; ?></span>
                <span><?php echo $orden->producto; ?></span>
                <span><?php echo $orden->comentario; ?></span>
            </div>
            </div>
            
                

    <?php
    
        $actual = $orden->id;
        $proximo = $ordenes[$key + 1]->id ?? 0; // proximo elemento
       
        if(esUltimo($actual,$proximo)) { ?>
            <!-- <p class="total">Total: <span><?php //echo $total; ?> </span></p> -->

            
        <div> 
            <input id="ordenId" type="hidden" name="ordenId" value="<?php echo $orden->id; ?>">
            <input id="listo" type="submit" class="boton" value="Listo">
        </div>
            
    <?php }
        } // fin foreach?>
        
        
    </ul>
</div>







<?php
    $script = "
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/buscadorOrdenes.js'></script>
    "
    
?>
<h1 id="titulo" class="nombre-pagina">Panel de Venta</h1>

<?php include_once __DIR__ . "/../templates/barra.php"; ?>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<?php 
    if(count($venta) === 0) {
        echo "<h2>No existe una venta</h2>";
    }
?>

<div id="venta" class="ordenes-admin">
    <ul class="ordenes">
        <?php
        $idVenta = 0;
        $fechaTicket = "";
        $horaTicket = "";
        $mesaTicket = "";
        foreach($venta as $key => $v){
           if($idVenta !== $v->folio) {
            $total = 0;
           ?>
        <li class="admin-ordenes">
            <div class="datos-admin">
            <p>Folio: <span id="folio" class="producto"><?php echo $v->folio; ?></span></p>
            <p>Orden: <span class="producto"><?php echo $v->orden; ?></span></p>
            <p>Fecha: <span class="producto"><?php echo $v->fecha; ?></span></p>
            <p>Hora: <span class="producto"><?php echo $v->hora; ?></span></p>
            <p>Mesa: <span class="producto"><?php echo $v->mesa; ?></span></p>
            <p>Vendedor: <span class="producto"><?php echo $nombre; ?></span></p>
            <p>Mesero: <span class="producto"><?php echo $v->mesero; ?></span></p>
            </div>

            <!-- <h3>Productos</h3> -->
            <?php 

            $fechaTicket = $v->fecha; 
            $horaTicket = $v->hora;
            $mesaTicket = $v->mesa;
            ?>

           <?php
           $idVenta = $v->folio; 
            } // Fin if
            $total += $v->precio * $v->cantidad;
            ?>
            <div class="admin-header">
            <div class="header-productos">
                <p>Cant</p>
                <p>Producto</p>
                <p>Importe</p>
            </div>
            
            <div class="admin-productos">
                <span><?php echo $v->cantidad; ?></span>
                <span><?php echo $v->nombre; ?></span>
                <span><?php echo $importe = $v->cantidad * $v->precio; ?></span>
                <span><?php echo $v->precio; ?></span>
            </div>
            </div>
            
                

    <?php
    
        $actual = $v->folio;
        $proximo = $venta[$key + 1]->folio ?? 0; // proximo elemento
       
        if(esUltimo($actual,$proximo)) { ?>
            <p class="total">Total: <span id="total"><?php echo $total; ?> </span></p>
            <input id="totalefectivo" type="hidden" value="<?php echo $total; ?>">

        
            
    <?php }
        } // fin foreach?>
        
        <div class="contenedorcobro" id="contenedorCobro">
            <input id="efectivo" type="button" class="boton" value="Efectivo">
            <input id="tarjeta" type="button" class="boton" value="Tarjeta">
            <input class="inputCobro" type="number" value="" placeholder="Ingresa El Monto">
            
        </div>
        
        
    </ul>
</div>

<div id="ticket" class="ocultar">
<div class="ticket">
    <img src="/build/img/Logotipo.jpeg" alt="Logotipo de Cocina de la Abuela">

    <p class="centrado titulo">LA COCINA DE LA ABUELA</p>
    <p class="">Fecha: <?php echo $v->fecha; ?> <?php echo $v->hora; ?>
    <br>Folio: <?php echo $v->folio; ?>  mesa: <?php echo $v->mesa; ?></p>
    <P class="">Blvd. Diaz Ordaz 13601-8 <br>Hipodromo 2 c.p. 22195
    <br>Tijuana Baja California <br>Tel.: 664-216-0931 <br>RFC. FEHG850311JB7</P>
    


 
    <table>
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">imp.</th>
                        <th class="precio">prec.</th>
                    </tr>
         
                </thead>
                <?php
                $idVenta = 0;
                ?>
                <?php foreach($venta as $key => $v) : 
                    if($idVenta !== $v->folio) {
                        $total = 0;
                       ?>
                       
                    <?php
                    $idVenta = $v->folio; 
                    } // Fin if
                        $total += $v->precio * $v->cantidad;
                        
                    ?>
                <tbody>
                    <tr>
                        <td class="cantidad"><?php echo $v->cantidad; ?></td>
                        <td class="producto"><?php echo $v->nombre; ?></td>
                        <td class="precio"><?php echo $importe = $v->cantidad * $v->precio; ?></td>
                        <td class="precio"><?php echo $v->precio; ?></td>

                    </tr>
                    
                </tbody>
                <?php endforeach; ?>

                <tr>
                       
                        <td class="cantidad"></td>
                        <td class="producto">TOTAL</td>
                        <td class="precio"><?php echo $total ?></td>
                                    
                </tr>

                <tr>
                        <td class="producto">CAMBIO</td>
                        <td id="cambio" class="precio"></td>
                </tr>
            </table>
           

  
</div>
</div>



<?php
    $script = "
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/venta.js'></script>
    "
    
?>




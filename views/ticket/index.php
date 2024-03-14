<div class="ticket">
    <img src="/build/img/Logotipo.jpeg" alt="Logotipo de Cocina de la Abuela">

    <p class="centrado titulo">LA COCINA DE LA ABUELA</p>
    <P class="centrado">Blvd. Diaz Ordaz 13601-8 <br>Hipodromo 2 c.p. 22195
    <br>Tijuana Baja California <br>Tel.: 664-216-0931 <br>RFC. FEHG850311JB7</P>
    <p class="centrado">Fecha: <?php echo $v->fecha; ?> <br>Hora: <?php echo $v->hora; ?></p>
    <p class="centrado">Folio:<?php echo $v->folio ." Mesa: ". $v->mesa; ?></p>


 
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
            </table>
           

  
</div>


<?php
    $script = "<script src='build/js/venta.js'></script>
    "
    
?>
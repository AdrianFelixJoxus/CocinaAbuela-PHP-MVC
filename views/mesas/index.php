<h1>Mesas</h1>

<?php include_once __DIR__ . "/../templates/alertas.php" ?>

<div class="contenedor contenido-venta">
    <div class="venta__mesas">
        <?php foreach($mesas as $mesa): ?>
        <div class="venta__mesa--diseño">
          
            <form action="/mesas" method="POST">
            <input type="hidden" name="id" value="<?php echo $mesa->id; ?>">
            <input type="hidden" name="tipo" value="mesa">
            <input class="boton2 venta__mesa--diseño2" type="submit" value="Mesa <?php echo $mesa->numero ?>">
            </form>
            
        </div>
        <?php endforeach; ?>
    </div>
</div>

    

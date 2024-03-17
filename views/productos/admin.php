<?php include_once __DIR__ . "/../templates/barra.php"; ?>

<main class="contenedor">
    <h1>Administrador de Casa Abuela</h1>
    
    <?php $resultado = $_GET["resultado"] ?>
    <?php if($resultado) {
        $mensaje = mostrarMensaje(intval($resultado));
        if($mensaje) {?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
        <?php }
    }?>


    <div class="botonesAdmin">
        <a href="/productos-crear" class="boton2 boton-verde">Nuevo Producto</a>
        <a href="/ordenes" class="boton2 boton-amarillo">Ver Ordenes</a>
        <a href="/ventas" class="boton2 boton-amarillo">Ver Ventas</a>
    </div>

    <h2>Productos</h2>

    <form method="POST" class="w-100">
        <input type="text" name="name">
        <input class="input" type="hidden" name="tipo" value="search">
        <input type="submit" class="boton-amarillo" value="Buscar">
    </form>

    <table class="propiedades">
        <thead>
            <tr>
                
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Codigo</th>
                <th>Acciones</th>
            </tr>
        </thead>


        <tbody> <!-- Mostrar los resultados-->
        <?php foreach($productos as $producto): ?>
            
            <tr>
                
                <td><?php echo $producto->nombre; ?></td>
                <td><?php foreach($categorias as $categoria) { 
                     if($categoria->id == $producto->categoriasId) { 
                        $categoriaNombre = $categoria->nombre;
                      }
                    } ?>
                    <?php echo $categoriaNombre ?></td>
                <td><?php echo $producto->precio; ?></td>
                <td><?php echo $producto->codigo; ?></td>
                
                <td class="tdBotones">
                    <form method="POST" class="w-100" action="/productos-eliminar">
                        <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                        <input type="hidden" name="tipo" value="producto">
                        <input type="submit" class="boton-rojo-admin" value="Eliminar">
                    </form>
                    <a href="/productos-actualizar?id=<?php echo $producto->id; ?>" class="boton boton-amarillo-admin">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php 
    $script = "
        <script src='build/js/app.js'></script>
    "

?>
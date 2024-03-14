<main class="contenedor">
        <h1>Crear Producto</h1>

        <a href="/admin-productos" class="boton boton-verde">volver</a>
        <?php include_once __DIR__ . "/../templates/alertas.php" ?>

        <form class="formulario" method="POST" action="/productos-crear">

            <?php include __DIR__ . "/formulario.php" ?>

            <input type="submit" value="Registrar Producto" class="boton boton-verde">
        </form>

</main>
<main class="contenedor">
        <h1 class="nombre-pagina">Crear Cuenta</h1>
        <p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

        <?php include_once __DIR__ . "/../templates/alertas.php" ?>

        <form class="formulario" method="POST" action="/crear-cuenta">

            <?php include __DIR__ . "/formulario.php" ?>

            <input type="submit" value="Crear Cuenta" class="boton boton-azul">
        </form>

        <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia sesion</a>
        <a href="/olvide">¿Olvidaste tu password?</a>
        </div>

</main>
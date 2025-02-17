<main class="contenedor">
<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesion con tus datos</p>

<?php include_once __DIR__ . "/../templates/alertas.php" ?>

<form class="formulario" method="POST" action="/">
<fieldset>
    <div class="campo">
    
        <label for="usuario">Usuario</label>
        <input 
            type="text"
            id="usuario"
            placeholder="Tu Usuario"
            name="usuario"
            value="<?php s($usuario->usuario) ?>"
        >
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="Tu password"
            name="password"
            value="<?php s($usuario->password) ?>"
        >
    </div>
</fieldset>
    <input class="boton boton-verde-block" type="submit" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear una</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>
</main>
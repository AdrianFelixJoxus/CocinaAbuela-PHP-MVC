<main class="contenedor">
    <h1>Administrador de Casa Abuela</h1>

   
    <a href="/admin" class="boton2 boton-verde">Volver</a>
    <a href="/usuarios/crear" class="boton2 boton-amarillo">Registrar Usuario</a>
    <a href="/mesa/crear" class="boton2 boton-amarillo">Registrar Mesa</a>


    <h2>Usuarios</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Usuario</th>
                <th>Confirmado</th>
                <th>cajero</th>
                <th>
                <!-- <form method="POST" class="w-100">
                    <input type="text" name="name">
                    <input class="input" type="hidden" name="tipo" value="search">
                    <input type="submit" class="boton-rojo3" value="Buscar">
                </form>     -->
                    
                    
                </th>
            </tr>
        </thead>


        <tbody> <!-- Mostrar los resultados-->
        <?php foreach($usuarios as $usuario): ?>
            
            <tr>
                <td><?php echo $usuario->id; ?></td>
                <td><?php echo $usuario->nombre . " " . $usuario->apellido; ?></td>
                <td><?php echo $usuario->telefono; ?></td>
                <td><?php echo $usuario->email ?? "Usuario No Registrado"; ?></td>
                <td><?php echo $usuario->confirmado; ?></td>
                <td><?php echo $usuario->cajero; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/usuarios/eliminar">
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                        <input type="hidden" name="tipo" value="usuario">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/usuario/actualizar?id=<?php echo $producto->id; ?>" class="boton boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Mesas</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Num de mesa</th>
                <th>Acciones</th>
                <th>
                <!-- <form method="POST" class="w-100">
                    <input type="text" name="name">
                    <input class="input" type="hidden" name="tipo" value="search">
                    <input type="submit" class="boton-rojo3" value="Buscar">
                </form>     -->
                    
                    
                </th>
            </tr>
        </thead>


        <tbody> <!-- Mostrar los resultados-->
        <?php foreach($mesas as $mesa): ?>
            
            <tr>
                <td><?php echo $mesa->id; ?></td>
                <td><?php echo $mesa->num ?></td>
                <td>
                    <form method="POST" class="w-100" action="/usuarios/eliminar">
                        <input type="hidden" name="id" value="<?php echo $mesa->id; ?>">
                        <input type="hidden" name="tipo" value="mesa">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/mesa/actualizar?id=<?php echo $mesa->id; ?>" class="boton boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<fieldset>
    <legend>Informacion Producto</legend>

    <label for="nombre">Nombre:</label>
    <input 
    type="text" 
    id="nombre" 
    name="producto[nombre]"
    maxlength = "40"
    placeholder="Nombre Producto" 
    value="<?php echo s($producto->nombre); ?>">

    <label for="precio">Precio:</label>
    <input 
    type="number" 
    id="precio" 
    name="producto[precio]" 
    placeholder="Precio Producto"
    value="<?php echo s($producto->precio); ?>">

    <label for="codigo">Codigo:</label>
    <input 
    type="text" 
    id="codigo" 
    name="producto[codigo]"
    placeholder="Codigo Producto"
    value="<?php echo s($producto->codigo); ?>">

    <label for="categoria">Categoria</label>
    <select name="producto[categoriasId]" id="categoriasId">
    <option selected value="">-- Seleccione --</option>
      <?php foreach($categorias as $categoria): ?>
        <option <?php echo $producto->categoriasId === $categoria->id ? "selected" : "" ?> value="<?php echo s($categoria->id) ?>"><?php echo $categoria->nombre ?></option>
        <?php endforeach ?>
    </select>

    <!-- <?php if($producto->id){ ?>
    disabled="disabled"
    <?php } ?> -->

</fieldset>
<?=$cabecera;?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar Datos</h5>
        <p class="card-text">
        <form method="post"  action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?=$libro['id']?>">


    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input id="nombre" value="<?=$libro['nombre']?>" class="form-control" type="text" name="nombre">
    </div>

    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input id="apellido" value="<?=$libro['apellido']?>" class="form-control" type="text" name="apellido">
    </div>

    <div class="form-group">
        <label for="celular">Celular:</label>
        <input id="celular" value="<?=$libro['celular']?>" class="form-control" type="text" name="celular">
    </div>


    <div class="form-group">
        <label for="imagen">Imagen:</label>

        <br/>
        <img class="img-thumbnail"
                    src="<?=base_url()?>/uploads/<?=$libro['imagen'];?>"
                    width="100" alt="">


        <input id="imagen" class="form-control-file" type="file" name="imagen">
    </div>
    <button class="btn btn-success" type="submit">Guardar</button>

   </form>
        </p>
    </div>
</div>

<?=$pie;?>
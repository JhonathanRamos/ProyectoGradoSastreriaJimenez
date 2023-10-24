<?=$cabecera?>

<?php if(session('mensaje')): ?>
<div class="alert alert-danger" role="alert">
    <?= session('mensaje') ?>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar Producto</h5>
        <p class="card-text">
            <form method="post" action="<?= site_url('/guardarProducto') ?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input id="descripcion" value="<?= old('descripcion') ?>" class="form-control" type="text" name="descripcion" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input id="precio" value="<?= old('precio') ?>" class="form-control" type="text" name="precio" required>
                </div>

                <div class="form-group">
                    <label for="fechaRegistro">Fecha de Registro:</label>
                    <input id="fechaRegistro" class="form-control" type="text" name="fechaRegistro" value="<?= date('Y-m-d'); ?>" disabled>
                </div>

                
                <div class="form-group">
                    <label for="imagen">Imagen Traje:</label>
                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                </div>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </p>
    </div>
</div>

<?=$pie?>

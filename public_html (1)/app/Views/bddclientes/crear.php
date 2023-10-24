<?=$cabecera?>

<?php if(session('mensaje')){?>

<div class="alert alert-danger" role="alert">
<?php
echo session('mensaje')
?>
</div>

<?php } ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar Datos del Cliente</h5>
        <p class="card-text">
            <form method="post" action="<?=site_url('/guardar')?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input id="nombre" value="<?=old('nombre')?>"  class="form-control" type="text" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input id="apellido"  value="<?=old('apellido')?>"  class="form-control" type="text" name="apellido" required>
                </div>


                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" class="form-control" name="sexo" required>
                        <option value="M" <?= (old('sexo') === 'M') ? 'selected' : '' ?>>Masculino</option>
                        <option value="F" <?= (old('sexo') === 'F') ? 'selected' : '' ?>>Femenino</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input id="celular"  value="<?=old('celular')?>"  class="form-control" type="text" name="celular" required>
                </div>



                <div class="form-group">
                    <label for="pago">Monto Pagado:</label>
                    <input id="pago" value="<?=old('pago')?>"  class="form-control" type="text" name="pago">
                </div>

                <div class="form-group">
                    <label for="fechaRegistro">Fecha de Registro:</label>
                    <input id="fechaRegistro" class="form-control" type="text" name="fechaRegistro" value="<?= date('Y-m-d'); ?>" disabled>
                </div>


                <button class="btn btn-success" type="submit">Guardar</button>
            </form>

        </p>
    </div>
</div>



<?=$pie?>


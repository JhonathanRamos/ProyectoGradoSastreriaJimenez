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
        <h5 class="card-title">Ingresar Medidas De La Falda</h5>
        <p class="card-text">
            <form method="post" action="<?=site_url('/actualizarFalda')?>" enctype="multipart/form-data">

            <input type="hidden" name="cliente_id" value="<?=$falda['cliente_id']?>">

                <div class="form-group">
                    <label for="largo">Largo:</label>
                    <input id="largo" value="<?=old('largo')?>"  class="form-control" type="text" name="largo" required>
                </div>

                <div class="form-group">
                    <label for="cintura">Cintura:</label>
                    <input id="cintura" value="<?=old('cintura')?>"  class="form-control" type="text" name="cintura" required>
                </div>

                <div class="form-group">
                    <label for="cadera">Cadera:</label>
                    <input id="cadera" value="<?=old('cadera')?>"  class="form-control" type="text" name="cadera" required>
                </div>

                <button class="btn btn-success" type="submit">Guardar</button>
            </form>

        </p>
    </div>
</div>

<?=$pie?>


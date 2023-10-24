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
        <h5 class="card-title">Ingresar Medidas Del Cliente</h5>
        <p class="card-text">
            <form method="post" action="<?=site_url('/guardarMasculino')?>" enctype="multipart/form-data">

                <div class="form-group">
                        <label for="cliente_id">Cliente ID:</label>
                        <input id="cliente_id" value="<?=old('cliente_id')?>" class="form-control" type="text" name="cliente_id" required>
                </div>
                
                <div class="form-group">
                    <label for="talle">Talle:</label>
                    <input id="talle" value="<?=old('talle')?>"  class="form-control" type="text" name="talle" required>
                </div>

                <div class="form-group">
                    <label for="largo">Largo:</label>
                    <input id="largo" value="<?=old('largo')?>"  class="form-control" type="text" name="largo" required>
                </div>

                <div class="form-group">
                    <label for="hombro">Hombro:</label>
                    <input id="hombro" value="<?=old('hombro')?>"  class="form-control" type="text" name="hombro" required>
                </div>

                <div class="form-group">
                    <label for="ancho">Ancho:</label>
                    <input id="ancho" value="<?=old('ancho')?>"  class="form-control" type="text" name="ancho" required>
                </div>

                <div class="form-group">
                    <label for="pecho">Pecho:</label>
                    <input id="pecho"pecho value="<?=old('pecho')?>"  class="form-control" type="text" name="pecho" required>
                </div>

                <div class="form-group">
                    <label for="estomago">Estomago:</label>
                    <input id="estomago" value="<?=old('estomago')?>"  class="form-control" type="text" name="estomago" required>
                </div>

                <div class="form-group">
                    <label for="largoManga">LargoManga:</label>
                    <input id="largoManga" value="<?=old('largoManga')?>"  class="form-control" type="text" name="largoManga" required>
                </div>


                <button class="btn btn-success" type="submit">Guardar</button>
            </form>

        </p>
    </div>
</div>



<?=$pie?>


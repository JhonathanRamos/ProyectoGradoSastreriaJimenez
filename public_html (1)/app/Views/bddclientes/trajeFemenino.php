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
            <form method="post" action="<?=site_url('/guardartrajeFemenino')?>" enctype="multipart/form-data">
           
            <div class="form-group">
                    <label for="cliente_id">Cliente:</label>
                    <select id="cliente_id" class="form-control" name="cliente_id" required>
                        <?php foreach ($clientes as $Cliente): ?>
                            <?php
                            $clienteTieneTrajeFemenino = false;
                            foreach ($trajeFemeninos as $trajeFemenino) {
                                if ($trajeFemenino['cliente_id'] === $Cliente['cliente_id']) {
                                    $clienteTieneTrajeFemenino = true;
                                    break;
                                }
                            }
                            ?>
                            <?php if (!$clienteTieneTrajeFemenino): ?>
                                <option value="<?= $Cliente['cliente_id'] ?>">
                                    <?= $Cliente['nombre_completo'] ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
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
                    <label for="cintura">Cintura:</label>
                    <input id="cintura" value="<?=old('cintura')?>"  class="form-control" type="text" name="cintura" required>
                </div>

                <div class="form-group">
                    <label for="cadera">Cadera:</label>
                    <input id="cadera" value="<?=old('cadera')?>"  class="form-control" type="text" name="cadera" required>
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


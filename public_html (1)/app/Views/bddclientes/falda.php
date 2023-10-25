<?=$cabecera?>

<?php if(session('mensaje')){?>
<div class="alert alert-danger" role="alert">
    <?php echo session('mensaje') ?>
</div>
<?php } ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar Medidas Del Cliente</h5>
        <p class="card-text">
            <form method="post" action="<?= site_url('/guardarFalda') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="cliente_id">Cliente:</label>
                    <select id="cliente_id" class="form-control" name="cliente_id" required>
                        <?php foreach ($clientes as $Cliente): ?>
                            <?php
                            $clienteTieneFalda = false;
                            foreach ($faldas as $falda) {
                                if ($falda['cliente_id'] === $Cliente['cliente_id']) {
                                    $clienteTieneFalda = true;
                                    break;
                                }
                            }
                            ?>
                            <?php if (!$clienteTieneFalda): ?>
                                <option value="<?= $Cliente['cliente_id'] ?>">
                                    <?= $Cliente['nombre_completo'] ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="largo">Largo:</label>
                    <input id="largo" value="<?= old('largo') ?>" class="form-control" type="text" name="largo" required>
                </div>
                <div class="form-group">
                    <label for="cintura">Cintura:</label>
                    <input id="cintura" value="<?= old('cintura') ?>" class="form-control" type="text" name="cintura" required>
                </div>
                <div class="form-group">
                    <label for="cadera">Cadera:</label>
                    <input id="cadera" value="<?= old('cadera') ?>" class="form-control" type="text" name="cadera" required>
                </div>
                <button class="btn btn-success" type="submit">Guardar</button>
            </form>
        </p>
    </div>
</div>

<?=$pie?>

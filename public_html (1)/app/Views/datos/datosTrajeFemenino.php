<?=$cabecera?>

<a class="btn btn-success" href="<?=base_url('crear')?>">Crear Clientes</a> 
<a class="btn btn-dark" href="<?=base_url('trajeMasculino')?>">Traje Masculino</a> 
<a class="btn btn-dark" href="<?=base_url('trajeFemenino')?>">Traje Femenino</a> 
<a class="btn btn-dark" href="<?=base_url('pantalon')?>">Pantalon</a> 
<a class="btn btn-dark" href="<?=base_url('falda')?>">Falda</a> 
<a class="btn btn-dark" href="<?=base_url('producto')?>">Subir Traje</a> 

<table class="table table-light">
    <thead class="thead-light">
        <h1>Traje Femenino</h1>
        <tr>
            <th>#</th>
            <th>Nombre Cliente</th>
            <th>Talle</th>
            <th>Largo</th>
            <th>Hombro</th>
            <th>Ancho</th>
            <th>Pecho</th>
            <th>Cintura</th>
            <th>Cadera</th>
            <th>Largo de Manga</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($trajeFemeninos as $TrajeFemenino): ?>
    <tr>
        <td><?= $TrajeFemenino['cliente_id']; ?></td>
        <td><?= $TrajeFemenino['nombre_completo']; ?></td> <!-- Acceder al nombre del cliente relacionado -->
        <td><?= $TrajeFemenino['talle']; ?></td>
        <td><?= $TrajeFemenino['largo']; ?></td>
        <td><?= $TrajeFemenino['hombro']; ?></td>
        <td><?= $TrajeFemenino['ancho']; ?></td>
        <td><?= $TrajeFemenino['pecho']; ?></td>
        <td><?= $TrajeFemenino['cintura']; ?></td>
        <td><?= $TrajeFemenino['cadera']; ?></td>
        <td><?= $TrajeFemenino['largoManga']; ?></td>
        <td>
            <div class="btn-group">
                <a href="<?= base_url('editar/' . $TrajeFemenino['cliente_id']); ?>" class="btn btn-outline-primary" style="margin-right: 2px;">Editar</a>
                <a href="<?= base_url('borrar/' . $TrajeFemenino['cliente_id']); ?>" class="btn btn-outline-danger" style="margin-right: 2px;">Borrar</a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>


 <a class="btn btn-dark" href="<?=base_url('cliente')?>">Cliente</a> 
 
 <a class="btn btn-dark" href="<?=base_url('datosFalda')?>">Falda</a> 

 <a class="btn btn-dark" href="<?=base_url('datosTrajeMasculino')?>">Traje Masculino</a> 

 <a class="btn btn-dark" href="<?=base_url('datosTrajeFemenino')?>">Traje Femenino</a> 

 <a class="btn btn-dark" href="<?=base_url('datosPantalon')?>">Pantalon</a> 

<?=$pie?>

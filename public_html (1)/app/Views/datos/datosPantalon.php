<?=$cabecera?>

<a class="btn btn-success" href="<?=base_url('crear')?>">Crear Clientes</a> 
<a class="btn btn-dark" href="<?=base_url('trajeMasculino')?>">Traje Masculino</a> 
<a class="btn btn-dark" href="<?=base_url('trajeFemenino')?>">Traje Femenino</a> 
<a class="btn btn-dark" href="<?=base_url('pantalon')?>">Pantalon</a> 
<a class="btn btn-dark" href="<?=base_url('falda')?>">Falda</a> 
<a class="btn btn-dark" href="<?=base_url('producto')?>">Subir Traje</a> 

<table class="table table-light">
    <thead class="thead-light">
        <h1>Pantalon</h1>
        <tr>
            <th>#</th>
            <th>Nombre Cliente</th>
            <th>Largo</th>
            <th>Entrepierna</th>
            <th>Cintura</th>
            <th>Cadera</th>
            <th>Pierna</th>
            <th>Rodilla</th>
            <th>Bota</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pantalones as $Pantalon): ?>
<tr>
    <td><?= $Pantalon['cliente_id']; ?></td>
    <td><?= $Pantalon['nombre_completo']; ?></td> <!-- Acceder al nombre del cliente relacionado -->
    <td><?= $Pantalon['largo']; ?></td>
    <td><?= $Pantalon['entrepierna']; ?></td>
    <td><?= $Pantalon['cintura']; ?></td>
    <td><?= $Pantalon['cadera']; ?></td>
    <td><?= $Pantalon['pierna']; ?></td>
    <td><?= $Pantalon['rodilla']; ?></td>
    <td><?= $Pantalon['bota']; ?></td>
    <td>
        <div class="btn-group">
            <a href="<?= base_url('editarPantalon/' . $Pantalon['cliente_id']); ?>" class="btn btn-outline-primary" style="margin-right: 2px;">Editar</a>
            <a href="<?= base_url('borrarPantalon/' . $Pantalon['cliente_id']); ?>" class="btn btn-outline-danger" style="margin-right: 2px;">Borrar</a>
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

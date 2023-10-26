<?=$cabecera?>


<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<nav class="menu">
			
            <a class="btn btn-dark" href="<?=base_url('cliente')?>">Cliente</a> 
 
            <a class="btn btn-dark" href="<?=base_url('datosFalda')?>">Falda</a> 

            <a class="btn btn-dark" href="<?=base_url('datosTrajeMasculino')?>">Traje Masculino</a> 

            <a class="btn btn-dark" href="<?=base_url('datosTrajeFemenino')?>">Traje Femenino</a> 

            <a class="btn btn-dark" href="<?=base_url('datosPantalon')?>">Pantalon</a> 
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
        <a class="btn btn-success" href="<?=base_url('crear')?>">Crear Clientes</a> 

<a class="btn btn-dark" href="<?=base_url('trajeMasculino')?>">Traje Masculino</a> 

<a class="btn btn-dark" href="<?=base_url('trajeFemenino')?>">Traje Femenino</a> 

<a class="btn btn-dark" href="<?=base_url('pantalon')?>">Pantalon</a> 

<a class="btn btn-dark" href="<?=base_url('falda')?>">Falda</a> 

<a class="btn btn-dark" href="<?=base_url('producto')?>">Subir Traje</a> 
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <h1>Traje Masculino</h1>
        <tr>
            <th>#</th>
            <th>Nombre Cliente</th>
            <th>Talle</th>
            <th>Largo</th>
            <th>Hombro</th>
            <th>Ancho</th>
            <th>Pecho</th>
            <th>Estómago</th>
            <th>Largo de Manga</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($trajeMasculinos as $TrajeMasculino): ?>
    <tr>
        <td><?= $TrajeMasculino['cliente_id']; ?></td>
        <td><?= $TrajeMasculino['nombre_completo']; ?></td> <!-- Acceder al nombre del cliente relacionado -->
        <td><?= $TrajeMasculino['talle']; ?></td>
        <td><?= $TrajeMasculino['largo']; ?></td>
        <td><?= $TrajeMasculino['hombro']; ?></td>
        <td><?= $TrajeMasculino['ancho']; ?></td>
        <td><?= $TrajeMasculino['pecho']; ?></td>
        <td><?= $TrajeMasculino['estomago']; ?></td>
        <td><?= $TrajeMasculino['largoManga']; ?></td>
        <td>
            <div class="btn-group">
                <a href="<?= base_url('editartrajeMasculino/' . $TrajeMasculino['cliente_id']); ?>" class="btn btn-outline-primary" style="margin-right: 2px;">Editar</a>
                <a href="<?= base_url('borrartrajeMasculino/' . $TrajeMasculino['cliente_id']); ?>" class="btn btn-outline-danger" style="margin-right: 2px;">Borrar</a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>



<?=$pie?>

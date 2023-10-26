

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
            <h1>Clientes</h1>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Sexo</th>
                    <th>Celular</th>
                    <th>Pagado</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualizacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($clientes as $Cliente):?>

            <tr>
                    <td><?=$Cliente['id'];?></td>
                    <td><?=$Cliente['nombre'];?></td>
                    <td><?=$Cliente['apellido'];?></td>
                    <td><?= ($Cliente['sexo'] === 'M') ? 'Masculino' : 'Femenino'; ?></td>
                    <td><?=$Cliente['celular'];?></td>
                    <td id="pagoCell"><?= ($Cliente['pago'] === null || $Cliente['pago'] === '0') ? '<span style="color: red;">Falta pagar</span>' : $Cliente['pago'] . ' Bs'; ?></td>
                    <td><?=$Cliente['fechaRegistro'];?></td>
                    <td><?=$Cliente['fechaActualizacion'];?></td>




                   
                <td>
                <div class="btn-group">
                    <a href="<?= base_url('editar/' . $Cliente['id']); ?>" class="btn btn-outline-primary" style="margin-right: 2px;">Editar</a> 
                    <a href="<?= base_url('borrar/' . $Cliente['id']); ?>" class="btn btn-outline-danger" style="margin-right: 2px;">Borrar</a>
                   
                </div>


            </tr>

            <?php endforeach; ?>
                
            </tbody>
        </table>


        <?=$pie?>



 


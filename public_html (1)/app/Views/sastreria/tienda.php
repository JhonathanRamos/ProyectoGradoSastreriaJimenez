<?php
// Cargar el modelo Producto
use App\Models\Producto;

// Crear una instancia del modelo Producto
$productoModel = new Producto();

// Obtener los productos de la base de datos
$productos = $productoModel->findAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <img src="<?= base_url('img/logo.png') ?>" alt="Descripción de la imagen" id="logo">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="nosotros.html">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Ofertas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="diseno.html">Tienda</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="micuenta.html">Mi Cuenta</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="carrito.html">Carrito</a>
              </li>
    
             
    
            </ul>
            <form class="dropdown-header">
            </form>
          </div>
        </div>
      </nav>

      <br>
      <br>

      
      <style>
    .product-card {
      text-align: center;
      width: 300px; /* Establece un ancho fijo para el contenedor */
      height: 500px; /* Establece una altura fija para el contenedor */
      margin-bottom: 15px;

    }

    .product-image {
      width:  184.766px; /* Aprovecha todo el ancho del contenedor para la imagen */
      height:  184.766px; /* Ajusta la altura automáticamente */
      display: block;
      margin: 0 auto; 
    }
  </style>

<div class="container">
  <div class="row">
    <?php foreach ($productos as $producto): ?>
      <div class="col-6 col-md-3"> <!-- Colocar 3 para que haya 4 productos por fila -->
        <div class="card product-card">
          <img class="img-thumbnail product-image"
            src="<?= base_url() ?>/uploads/<?= $producto['imagen']; ?>"
            alt="<?= $producto['nombreProducto']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $producto['nombreProducto']; ?></h5>
            <p class="card-text"><?= $producto['descripcion']; ?></p>
            <p class="card-text"><?= $producto['precio']; ?> Bs.</p>
            <a href="#" class="btn btn-primary">Ver Detalles</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


      

      <br>
      <br>
      <footer class="bg-dark text-white p-3">
          <div class="container">
              <div class="row">
                  <div class="col-lg-5">
                      <h3>Contacta con Nosotros</h3>
                      <div>

                      <a id="facebook-link" href="https://www.facebook.com/profile.php?id=100054542077029" class="text-white me-2" target="_blank">
                          <img src="<?= base_url('img/facebook.png') ?>" height="35px" width="35px"> Sastreria Jimenez
                      </a>
                      <br>
                      <a id="whatsapp-link" href="https://wa.me/59177448360"class="text-white" target="_blank">
                          <img src="<?= base_url('img/whatsapp.png') ?>" height="35px" width="35px"> Luis Polo - (77448360)
                      </a>
                      <br>
                      <a id="whatsapp-link" href="https://wa.me/59165741113"class="text-white" target="_blank">
                        <img src="<?= base_url('img/whatsapp.png') ?>"  height="35px" width="35px"> Laura Jimenez - (65741113)
                    </a>
                      
                    </div>
                  </div>
                  <div class="col-lg-4">
                      <h3>Información de Contacto</h3>
                      <address>
                          <strong>Sastrería Jimenez</strong><br>
                          Dirección: San Loranzo - Av-D'Orbigny, Cochabamba
                          <br>
                          Correo Electrónico: lauraximena@gmail.com
                      </address>
                  </div>
                  
                  <div class="col-lg-3">
                    <h3>Detalles Adicionales</h3>
                    <ul>
                        <li><a href="#">Términos y Condiciones</a></li>
                        <li><a href="#">Detalles de Entrega</a></li>
                    </ul>
                </div>
              </div>
          </div>
      </footer>
  
  
  


<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/64caaa5ecc26a871b02ce0d7/1h6rqj0tt';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


/* Tablas  */
//Vista Cliente
$routes->get('cliente', 'Clientes::index');
$routes->get('crear', 'Clientes::crear');
//CRUD CLIENTE
$routes->post('guardar', 'Clientes::guardar');
$routes->get('borrar/(:num)', 'Clientes::borrar/$1');
$routes->get('editar/(:num)', 'Clientes::editar/$1');
$routes->post('actualizar', 'Clientes::actualizar');

/* ______________________________________________________________________ */

//Vista Falda
$routes->get('datosFalda', 'Faldas::index');
$routes->get('falda', 'Faldas::falda');

//CRUD FALDA
$routes->post('guardarFalda', 'Faldas::guardarFalda');
$routes->get('borrarFalda/(:num)', 'Faldas::borrarFalda/$1');
$routes->get('editarFalda/(:num)', 'Faldas::editarFalda/$1');
$routes->post('actualizarFalda', 'Faldas::actualizarFalda');

/* ______________________________________________________________________ */

//Vista Pantalon
$routes->get('datosPantalon', 'Pantalons::index');
$routes->get('pantalon', 'Pantalons::pantalon');

//CRUD PANTALON
$routes->post('guardarPantalon', 'Pantalons::guardarPantalon');
$routes->get('borrarPantalon/(:num)', 'Pantalons::borrarPantalon/$1');
$routes->get('editarPantalon/(:num)', 'Pantalons::editarPantalon/$1');
$routes->post('actualizarPantalon', 'Pantalons::actualizarPantalon');

/* ______________________________________________________________________ */

//Vista TrajeMasculino
$routes->get('datosTrajeMasculino', 'TrajeMasculinos::index');
$routes->get('trajeMasculino', 'TrajeMasculinos::trajeMasculino');
$routes->post('guardarMasculino', 'TrajeMasculinos::guardar');

//Vista TrajeFemenino
$routes->get('datosTrajeFemenino', 'TrajeFemeninos::index');
$routes->get('trajeFemenino', 'TrajeFemeninos::trajeFemenino');
$routes->post('guardarFemenino', 'TrajeFemeninos::guardar');


//HTML SASTRERIA
$routes->get('comprar.html', 'Clientes::comprar');
$routes->get('traje.html', 'Clientes::traje');
$routes->get('diseno.html', 'Clientes::diseno');
$routes->get('novedad.html', 'Clientes::novedad');
$routes->get('sacoFemenino.html', 'Clientes::sacoFemenino');
$routes->get('sacoMasculino.html', 'Clientes::sacoMasculino');
$routes->get('index.html', 'Clientes::index1');
$routes->get('nosotros.html', 'Clientes::nosotros');
$routes->get('tienda', 'Clientes::tienda');









$routes->get('producto', 'Productos::producto');
$routes->post('guardarProducto', 'Productos::guardar');

<?php 
namespace App\Models;

use CodeIgniter\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombreProducto', 'descripcion', 'precio', 'imagen','estado', 'carrito', 'fechaRegistro', 'fechaActualizacion'];
}

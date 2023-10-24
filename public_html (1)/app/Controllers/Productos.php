<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;

class Productos extends Controller
{
    public function producto()
    {
        $producto= new Producto();
        $datos['productos']=$producto->orderBy('id')->findAll();
        // $datos['productos']=$producto->orderBy('id','ASC')->findAll();

        
        $datos['cabecera']=view('template/cabecera');
        $datos['pie']=view('template/piepagina');

        return view('productos/producto', $datos);
    }

    public function guardar()
    {
        $producto = new Producto();

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1920]',
            ]
            ]);
            if(!$validacion){

                return $this->response->redirect(site_url('/tienda'));
            }
    
        if($imagen=$this->request->getFile('imagen')){
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/',$nuevoNombre);

        $datos = [
            'nombreProducto' => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion'),
            'precio' => $this->request->getVar('precio'),
            'estado' => 1, // Establecer el estado en 1
            'fechaRegistro' => date('Y-m-d'),
            'fechaActualizacion' => date('Y-m-d'),
            'imagen'=>$nuevoNombre
        ];
        $producto->insert($datos);
     }
        return $this->response->redirect(site_url('/tienda'));
    }
    
}

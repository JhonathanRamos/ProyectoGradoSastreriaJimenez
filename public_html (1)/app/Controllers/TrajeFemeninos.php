<?php 
namespace App\Controllers;

use App\Models\TrajeFemenino;
use App\Models\Cliente;
use CodeIgniter\Controller;

class TrajeFemeninos extends Controller{



    public function trajeFemenino(){

        $clienteModel = new Cliente();
        $clientes = $clienteModel->select('id AS cliente_id, CONCAT(nombre, " ", apellido) AS nombre_completo')
            ->where('estado', 1)
            ->findAll();
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        $datos['clientes'] = $clientes; // Pasar la lista de clientes a la vista
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $trajeFemeninoModel = new TrajeFemenino();
        $trajeFemenino = $trajeFemeninoModel->select('traje_femenino.cliente_id')
            ->join('cliente', 'cliente.id = traje_femenino.cliente_id')
            ->findAll();
    
        $datos['trajeFemeninos'] = $trajeFemenino; // Pasar la lista de faldas a la vista
    
        return view('bddclientes/trajeFemenino', $datos);
      
    }

    public function index() {
        $trajeFemeninoModel = new TrajeFemenino();
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $trajeFemenino = $trajeFemeninoModel->select('traje_femenino.cliente_id, CONCAT( cliente.nombre ," ", cliente.apellido ) AS nombre_completo , traje_femenino.talle, traje_femenino.largo, 
        traje_femenino.hombro , traje_femenino.ancho , traje_femenino.pecho , traje_femenino.cintura , traje_femenino.cadera ,traje_femenino.largoManga')
            ->join('cliente', 'cliente.id = traje_femenino.cliente_id')
            ->orderBy('cliente_id', 'ASC')
            ->where('estado', 1)
            ->findAll();
    
        $datos['trajeFemeninos'] = $trajeFemenino;
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('datos/datosTrajeFemenino', $datos);
    }
   

    public function guardartrajeFemenino() {

        $trajeFemeninoModel = new TrajeFemenino();

        $clienteModel = new Cliente(); // Asegúrate de importar el modelo de Cliente
    
        // Obtén la lista de clientes activos
        $clientes = $clienteModel->where('estado', 1)->findAll();

        $datos = [
            'clientes' => $clientes, 
            'cliente_id' => $this->request->getVar('cliente_id'),
            'talle' => $this->request->getVar('talle'),
            'largo' => $this->request->getVar('largo'),
            'hombro' => $this->request->getVar('hombro'),
            'ancho' => $this->request->getVar('ancho'),
            'pecho' => $this->request->getVar('pecho'),
            'cintura' => $this->request->getVar('cintura'),
            'cadera' => $this->request->getVar('cadera'),
            'largoManga' => $this->request->getVar('largoManga')
        ];

        $trajeFemeninoModel->insert($datos);
        return redirect()->to(site_url('datosTrajeFemenino'));
    }

     //SE PRUEBA DESDE AQUI EL EDITAR Y BORRAR AGREGASTE ESTADO EN MYSQL --> EL PROBLEMA ES CON EL ID A LO QUE VEO AGREGA EL GIT PTM XD WEY
    
     public function borrartrajeFemenino($cliente_id = null)
     {
         $trajeFemeninoModel = new TrajeFemenino();
         
       
         $trajeFemenino = $trajeFemeninoModel->where('cliente_id', $cliente_id)->first();
         
         if ($trajeFemenino) {
          
             $trajeFemeninoModel->delete($trajeFemenino['cliente_id']);
         }
         
         return redirect()->to(site_url('/datosTrajeFemenino'));
     }
     

 
     
     
     public function editartrajeFemenino($cliente_id = null)
     {
         $trajeFemeninoModel = new TrajeFemenino();
     
         // Busca la falda asociada al cliente_id
         $trajeFemenino = $trajeFemeninoModel->where('cliente_id', $cliente_id)->first();
     
         if (!$trajeFemenino) {
             // Manejar la situación si no se encuentra la falda asociada al cliente
             return redirect()->to(site_url('/datosTrajeFemenino'));
         }
     
         $datos['trajeFemeninos'] = $trajeFemenino;
         $datos['cabecera'] = view('template/cabecera');
         $datos['pie'] = view('template/piepagina');
         return view('datos/editarTrajeFemenino', $datos);
     }
     
 
     public function actualizartrajeFemenino(){

         $trajeFemenino = new TrajeFemenino();
 
         $datos=[
         
            'talle' => $this->request->getVar('talle'),
            'largo' => $this->request->getVar('largo'),
            'hombro' => $this->request->getVar('hombro'),
            'ancho' => $this->request->getVar('ancho'),
            'pecho' => $this->request->getVar('pecho'),
            'cintura' => $this->request->getVar('cintura'),
            'cadera' => $this->request->getVar('cadera'),
            'largoManga' => $this->request->getVar('largoManga')
           
  
         ];
         $id= $this->request->getVar('cliente_id');
 
         $validacion = $this->validate([
             'talle' => 'required|numeric|min_length[1]',
             'largo' => 'required|numeric|min_length[1]',
             'hombro' => 'required|numeric|min_length[1]',
             'ancho' => 'required|numeric|min_length[1]',
             'pecho' => 'required|numeric|min_length[1]',
             'cintura' => 'required|numeric|min_length[1]',
             'cadera' => 'required|numeric|min_length[1]',
             'largoManga' => 'required|numeric|min_length[1]'
         ]);
     
         if (!$validacion) {
             $session= session();
             $session->setFlashdata('mensaje','Revise la informacion ');
 
 
             return redirect()->back()->withInput();
       
         }
 
 
         $trajeFemenino->update($id,$datos);
 
         return redirect()->to(site_url('/datosTrajeFemenino'));
     }
     
}

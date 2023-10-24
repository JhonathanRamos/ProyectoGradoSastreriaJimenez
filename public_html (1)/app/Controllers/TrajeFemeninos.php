<?php 
namespace App\Controllers;

use App\Models\TrajeFemenino;
use App\Models\TrajeMasculino;
use CodeIgniter\Controller;

class TrajeFemeninos extends Controller{



    public function trajeFemenino(){

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
 
        return view('bddclientes/trajeFemenino',$datos);
      
    }

    public function index() {
        $trajeFemeninoModel = new TrajeFemenino();
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $trajeFemenino = $trajeFemeninoModel->select('traje_femenino.cliente_id, CONCAT( cliente.nombre ," ", cliente.apellido ) AS nombre_completo , traje_femenino.talle, traje_femenino.largo, 
        traje_femenino.hombro , traje_femenino.ancho , traje_femenino.pecho , traje_femenino.cintura , traje_femenino.cadera ,traje_femenino.largoManga')
            ->join('cliente', 'cliente.id = traje_femenino.cliente_id')
            ->orderBy('cliente_id', 'ASC')
            ->findAll();
    
        $datos['trajeFemeninos'] = $trajeFemenino;
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('datos/datosTrajeFemenino', $datos);
    }
   

    public function guardar() {
        $trajeMasculino = new TrajeFemenino(); // Make sure to use the correct model name

        $datos = [
            'cliente_id' => $this->request->getVar('cliente_id'), // Agregar cliente_id
            'talle' => $this->request->getVar('talle'),
            'largo' => $this->request->getVar('largo'),
            'hombro' => $this->request->getVar('hombro'),
            'ancho' => $this->request->getVar('ancho'),
            'pecho' => $this->request->getVar('pecho'),
            'cintura' => $this->request->getVar('cintura'),
            'cadera' => $this->request->getVar('cadera'),
            'largoManga' => $this->request->getVar('largoManga')
        ];

        $trajeMasculino->insert($datos);
        return redirect()->to(site_url('/datosTrajeFemenino'));
    }
}

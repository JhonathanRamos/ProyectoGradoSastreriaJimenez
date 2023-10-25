<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TrajeMasculino; // Make sure to import the appropriate model
use App\Models\Cliente;

class TrajeMasculinos extends Controller {

    public function trajeMasculino(){

        $clienteModel = new Cliente();
        $clientes = $clienteModel->select('id AS cliente_id, CONCAT(nombre, " ", apellido) AS nombre_completo')
            ->where('estado', 1)
            ->findAll();
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        $datos['clientes'] = $clientes; // Pasar la lista de clientes a la vista
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $trajeMasculinoModel = new TrajeMasculino();
        $trajeMasculino = $trajeMasculinoModel->select('traje_masculino.cliente_id')
            ->join('cliente', 'cliente.id = traje_masculino.cliente_id')
            ->findAll();
    
        $datos['trajeMasculinos'] = $trajeMasculino; // Pasar la lista de faldas a la vista
    
        return view('bddclientes/trajeMasculino', $datos);
      
    }

    public function index() {
        $trajeMasculinoModel = new TrajeMasculino();
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $trajeMasculino = $trajeMasculinoModel->select('traje_masculino.cliente_id, CONCAT( cliente.nombre ," ", cliente.apellido ) AS nombre_completo , traje_masculino.talle, traje_masculino.largo, 
        traje_masculino.hombro , traje_masculino.ancho , traje_masculino.pecho , traje_masculino.estomago , traje_masculino.largoManga')
            ->join('cliente', 'cliente.id = traje_masculino.cliente_id')
            ->orderBy('cliente_id', 'ASC')
            ->where('estado', 1)
            ->findAll();
    
        $datos['trajeMasculinos'] = $trajeMasculino;
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('datos/datosTrajeMasculino', $datos);
    }

    public function guardartrajeMasculino() {
        $trajeMasculino = new TrajeMasculino(); // Make sure to use the correct model name

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
            'estomago' => $this->request->getVar('estomago'),
            'largoManga' => $this->request->getVar('largoManga')
        ];

        $trajeMasculino->insert($datos);
        return redirect()->to(site_url('/datosTrajeMasculino'));
    }

    //SE PRUEBA DESDE AQUI EL EDITAR Y BORRAR AGREGASTE ESTADO EN MYSQL --> EL PROBLEMA ES CON EL ID A LO QUE VEO AGREGA EL GIT PTM XD WEY
    
    public function borrartrajeMasculino($cliente_id = null)
    {
        $trajeMasculinoModel = new TrajeMasculino();
        
      
        $trajeMasculino = $trajeMasculinoModel->where('cliente_id', $cliente_id)->first();
        
        if ($trajeMasculino) {
         
            $trajeMasculinoModel->delete($trajeMasculino['cliente_id']);
        }
        
        return redirect()->to(site_url('/datosTrajeMasculino'));
    }
    


    
    
    public function editartrajeMasculino($cliente_id = null)
    {
        $trajeMasculinoModel = new TrajeMasculino();
    
        // Busca la falda asociada al cliente_id
        $trajeMasculino = $trajeMasculinoModel->where('cliente_id', $cliente_id)->first();
    
        if (!$trajeMasculino) {
            // Manejar la situación si no se encuentra la falda asociada al cliente
            return redirect()->to(site_url('/datosTrajeMasculino'));
        }
    
        $datos['trajeMasculinos'] = $trajeMasculino;
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        return view('datos/editarTrajeMasculino', $datos);
    }
    

    public function actualizartrajeMasculino(){

        $trajeMasculino = new TrajeMasculino();

        $datos=[
        
            'talle' => $this->request->getVar('talle'),
            'largo' => $this->request->getVar('largo'),
            'hombro' => $this->request->getVar('hombro'),
            'ancho' => $this->request->getVar('ancho'),
            'pecho' => $this->request->getVar('pecho'),
            'estomago' => $this->request->getVar('estomago'),
            'largoManga' => $this->request->getVar('largoManga')
          
 
        ];
        $id= $this->request->getVar('cliente_id');

        $validacion = $this->validate([
            'talle' => 'required|numeric|min_length[1]',
            'largo' => 'required|numeric|min_length[1]',
            'hombro' => 'required|numeric|min_length[1]',
            'ancho' => 'required|numeric|min_length[1]',
            'pecho' => 'required|numeric|min_length[1]',
            'estomago' => 'required|numeric|min_length[1]',
            'largoManga' => 'required|numeric|min_length[1]'
        ]);
    
        if (!$validacion) {
            $session= session();
            $session->setFlashdata('mensaje','Revise la informacion ');


            return redirect()->back()->withInput();
      
        }


        $trajeMasculino->update($id,$datos);

        return redirect()->to(site_url('/datosTrajeMasculino'));
    }

}

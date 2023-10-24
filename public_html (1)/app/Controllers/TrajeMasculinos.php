<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TrajeMasculino; // Make sure to import the appropriate model

class TrajeMasculinos extends Controller {

    public function trajeMasculino() {
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');

        return view('bddclientes/trajeMasculino', $datos);
    }

    public function index() {
        $trajeMasculinoModel = new TrajeMasculino();
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $trajeMasculino = $trajeMasculinoModel->select('traje_masculino.cliente_id, CONCAT( cliente.nombre ," ", cliente.apellido ) AS nombre_completo , traje_masculino.talle, traje_masculino.largo, 
        traje_masculino.hombro , traje_masculino.ancho , traje_masculino.pecho , traje_masculino.estomago , traje_masculino.largoManga')
            ->join('cliente', 'cliente.id = traje_masculino.cliente_id')
            ->orderBy('cliente_id', 'ASC')
            ->findAll();
    
        $datos['trajeMasculinos'] = $trajeMasculino;
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('datos/datosTrajeMasculino', $datos);
    }

    public function guardar() {
        $trajeMasculino = new TrajeMasculino(); // Make sure to use the correct model name

        $datos = [
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
        return redirect()->to(site_url('/trajeMasculino'));
    }
}

<?php 
namespace App\Controllers;

use App\Models\Pantalon;
use CodeIgniter\Controller;

class Pantalons extends Controller{



    public function pantalon(){

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
 
        return view('bddclientes/pantalon',$datos);
      
    }

    
    public function index() {
        $pantalonModel = new Pantalon();
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $pantalon = $pantalonModel->select('pantalon.cliente_id, CONCAT( cliente.nombre ," ", cliente.apellido ) AS nombre_completo , pantalon.largo, pantalon.entrepierna, 
        pantalon.cintura , pantalon.cadera , pantalon.pierna , pantalon.rodilla , pantalon.bota')
            ->join('cliente', 'cliente.id = pantalon.cliente_id')
            ->orderBy('cliente_id', 'ASC')
            ->findAll();
    
        $datos['pantalones'] = $pantalon;
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('datos/datosPantalon', $datos);
    }
    

    public function guardarPantalon() {
        $pantalonModel = new Pantalon(); // Make sure to use the correct model name

        $datos = [
            'cliente_id' => $this->request->getVar('cliente_id'), // Agregar cliente_id
            'largo' => $this->request->getVar('largo'),
            'entrepierna' => $this->request->getVar('entrepierna'),
            'cintura' => $this->request->getVar('cintura'),
            'cadera' => $this->request->getVar('cadera'),
            'pierna' => $this->request->getVar('pierna'),
            'rodilla' => $this->request->getVar('rodilla'),
            'bota' => $this->request->getVar('bota')
        ];

        $pantalonModel->insert($datos);
        return redirect()->to(site_url('/datosPantalon'));
    }

     //SE PRUEBA DESDE AQUI EL EDITAR Y BORRAR AGREGASTE ESTADO EN MYSQL --> EL PROBLEMA ES CON EL ID A LO QUE VEO AGREGA EL GIT PTM XD WEY
    
     public function borrarPantalon($cliente_id = null)
     {
         $pantalonModel = new Pantalon();
         
         // Busca la falda asociada al cliente_id
         $pantalon = $pantalonModel->where('cliente_id', $cliente_id)->first();
         
         if ($pantalon) {
             // Elimina la falda de la base de datos
             $pantalonModel->delete($pantalon['cliente_id']);
         }
         
         return redirect()->to(site_url('/datosPantalon'));
     }
     
     
 
 
     public function editarPantalon($cliente_id = null)
     {
         $pantalonModel = new Pantalon();
     
         // Busca la falda asociada al cliente_id
         $pantalon = $pantalonModel->where('cliente_id', $cliente_id)->first();
     
         if (!$pantalon) {
             // Manejar la situación si no se encuentra la falda asociada al cliente
             return redirect()->to(site_url('/datosPantalon'));
         }
     
         $datos['pantalon'] = $pantalon;
         $datos['cabecera'] = view('template/cabecera');
         $datos['pie'] = view('template/piepagina');
         return view('datos/editarPantalon', $datos);
     }
     
 
     public function actualizarPantalon(){
        
         $pantalon = new Pantalon();
 
         $datos=[


            'largo' => $this->request->getVar('largo'),
            'entrepierna' => $this->request->getVar('entrepierna'),
            'cintura' => $this->request->getVar('cintura'),
            'cadera' => $this->request->getVar('cadera'),
            'pierna' => $this->request->getVar('pierna'),
            'rodilla' => $this->request->getVar('rodilla'),
            'bota' => $this->request->getVar('bota')
           
  
         ];
         $id= $this->request->getVar('cliente_id');
 
         $validacion = $this->validate([
             'largo' => 'required|numeric|min_length[1]',
             'cintura' => 'required|numeric|min_length[1]',
             'cadera' => 'required|numeric|min_length[1]', // Agregamos la validación para números
         ]);
     
         if (!$validacion) {
             $session= session();
             $session->setFlashdata('mensaje','Revise la informacion ');
 
 
             return redirect()->back()->withInput();
             // return $this->response->redirect(site_url('/cliente'));
         }
 
 
         $pantalon->update($id,$datos);
 
         return redirect()->to(site_url('/datosPantalon'));
     }
}

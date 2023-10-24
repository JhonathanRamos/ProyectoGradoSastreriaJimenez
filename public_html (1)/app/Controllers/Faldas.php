<?php 
namespace App\Controllers;

use App\Models\Falda;
use App\Models\Cliente;
use CodeIgniter\Controller;


class Faldas extends Controller{



    // public function falda(){

    //     $datos['cabecera']= view('template/cabecera');
    //     $datos['pie']= view('template/piepagina');
 
    //     return view('bddclientes/falda',$datos);
      
    // }

    // public function falda() {
    //     $clienteModel = new Cliente();
    //     $clientes = $clienteModel->select('id AS cliente_id, CONCAT(nombre, " ", apellido) AS nombre_completo')
    //                           ->where('estado', 1)
    //                           ->findAll();
    
    //     $datos['cabecera'] = view('template/cabecera');
    //     $datos['pie'] = view('template/piepagina');
    //     $datos['clientes'] = $clientes; // Pasar la lista de clientes a la vista
    
    //     return view('bddclientes/falda', $datos);
    // }

    public function falda() {
        $clienteModel = new Cliente();
        $clientes = $clienteModel->select('id AS cliente_id, CONCAT(nombre, " ", apellido) AS nombre_completo')
            ->where('estado', 1)
            ->findAll();
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        $datos['clientes'] = $clientes; // Pasar la lista de clientes a la vista
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $faldaModel = new Falda();
        $faldas = $faldaModel->select('falda.cliente_id')
            ->join('cliente', 'cliente.id = falda.cliente_id')
            ->findAll();
    
        $datos['faldas'] = $faldas; // Pasar la lista de faldas a la vista
    
        return view('bddclientes/falda', $datos);
    }
    

    
    
    
    
    public function index() {
        $faldaModel = new Falda();
    
        // Obtén los datos de las faldas y la relación 'cliente'
        $faldas = $faldaModel->select('falda.cliente_id, CONCAT( cliente.nombre ," ", cliente.apellido ) AS nombre_completo , falda.largo, falda.cintura, falda.cadera')
            ->join('cliente', 'cliente.id = falda.cliente_id')
            ->orderBy('cliente_id', 'ASC')
            ->findAll();
    
        $datos['faldas'] = $faldas;
    
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('datos/datosFalda', $datos);
    }
    
    public function guardarFalda() {
        $faldaModel = new Falda();
        $clienteModel = new Cliente(); // Asegúrate de importar el modelo de Cliente
    
        // Obtén la lista de clientes activos
        $clientes = $clienteModel->where('estado', 1)->findAll();
    
        $datos = [
            'clientes' => $clientes, // Pasa la lista de clientes a la vista
            'cliente_id' => $this->request->getVar('cliente_id'),
            'largo' => $this->request->getVar('largo'),
            'cintura' => $this->request->getVar('cintura'),
            'cadera' => $this->request->getVar('cadera')
        ];
    
        $faldaModel->insert($datos);
    
        return redirect()->to(site_url('datosFalda'));
    }
    
    //SE PRUEBA DESDE AQUI EL EDITAR Y BORRAR AGREGASTE ESTADO EN MYSQL --> EL PROBLEMA ES CON EL ID A LO QUE VEO AGREGA EL GIT PTM XD WEY
    
    public function borrarFalda($cliente_id = null)
    {
        $faldaModel = new Falda();
        
        // Busca la falda asociada al cliente_id
        $falda = $faldaModel->where('cliente_id', $cliente_id)->first();
        
        if ($falda) {
            // Elimina la falda de la base de datos
            $faldaModel->delete($falda['cliente_id']);
        }
        
        return redirect()->to(site_url('/datosFalda'));
    }
    
    


    public function editarFalda($cliente_id = null)
    {
        $faldaModel = new Falda();
    
        // Busca la falda asociada al cliente_id
        $falda = $faldaModel->where('cliente_id', $cliente_id)->first();
    
        if (!$falda) {
            // Manejar la situación si no se encuentra la falda asociada al cliente
            return redirect()->to(site_url('/datosFalda'));
        }
    
        $datos['falda'] = $falda;
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        return view('datos/editarFalda', $datos);
    }
    

    public function actualizarFalda(){
        $falda = new Falda();

        $datos=[
        
            'largo' => $this->request->getVar('largo'),
            'cintura'=>$this->request->getVar('cintura'),
            'cadera'=>$this->request->getVar('cadera')
          
 
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


        $falda->update($id,$datos);

        return redirect()->to(site_url('/datosFalda'));
    }
    
}

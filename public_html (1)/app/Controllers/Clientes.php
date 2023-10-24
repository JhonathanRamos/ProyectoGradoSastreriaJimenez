<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Cliente;
use App\Models\TrajeMasculino;



class Clientes extends Controller{

    public function index()
    {
        $cliente = new Cliente();
        
        // Aplicar una condición para seleccionar solo clientes con estado igual a 1
        $datos['clientes'] = $cliente->where('estado', 1)->orderBy('id', 'ASC')->findAll();
    
        // Se está poniendo un nombre y dirigiendo donde están con $datos y la dirección con view
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
    
        return view('bddclientes/cliente', $datos);
    }
    


    //Se esta Creando la vista de CREAR
    public function crear(){

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
 
        return view('bddclientes/crear',$datos);
      
    }


    
    
    public function comprar(){
        return view('sastreria/comprar.html');
    }

    public function traje(){
        return view('sastreria/traje.html');
    }
    public function diseno(){
        return view('sastreria/diseno.html');
    }

    public function novedad(){
        return view('sastreria/novedad.html');
    }

    public function sacoFemenino(){
        return view('sastreria/sacoFemenino.html');
    }

    public function sacoMasculino(){
        return view('sastreria/sacoMasculino.html');
    }

    public function index1(){
        return view('sastreria/index.html');
    }

    public function nosotros(){
        return view('sastreria/nosotros.html');
    }

    public function tienda(){
        return view('sastreria/tienda');
    }

   

   

    //Se esta Guardando los datos 
    public function guardar()
    {
        $cliente = new Cliente();
    
        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'celular' => 'required|numeric|min_length[8]', // Agregamos la validación para números
        ]);
    
        if (!$validacion) {
            $session= session();
            $session->setFlashdata('mensaje','Revise la informacion ');


            return redirect()->back()->withInput();
            // return $this->response->redirect(site_url('/cliente'));
        }
    

        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'sexo' => $this->request->getVar('sexo'),
            'celular' => $this->request->getVar('celular'),
            'pago' => $this->request->getVar('pago'),
            'fechaRegistro' => date('Y-m-d'),
            'estado' => 1, // Estado activo
        ];
    
        $cliente->insert($datos);
        return redirect()->to(site_url('/cliente'));
    }
    

 
    public function borrar($id = null)
    {
        $clienteModel = new Cliente();

        // Verificamos si el cliente existe
        $cliente = $clienteModel->find($id);
        if (!$cliente) {
            // El cliente no existe, puedes manejar esta situación según tus necesidades
            return redirect()->to(site_url('/cliente'));
        }

        // Actualizamos el estado del cliente a 0 (inactivo) en lugar de eliminarlo físicamente
        $clienteModel->update($id, ['estado' => 0]);

        return redirect()->to(site_url('/cliente'));
    }

    public function editar($id=null)
    {
       
       
        $cliente= new Cliente();

        $datos['cliente']=$cliente->where('id',$id)->first();


        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('bddclientes/editar',$datos);
    }

    public function actualizar(){
        $cliente = new Cliente();

        date_default_timezone_set('America/La_Paz');
        $datos=[
            'nombre'=>$this->request->getVar('nombre'),
            'apellido'=>$this->request->getVar('apellido'),
            'sexo' => $this->request->getVar('sexo'),
            'celular'=>$this->request->getVar('celular'),
            'pago'=>$this->request->getVar('pago'),
            'fechaActualizacion' => date('Y-m-d'),
            'estado' => 1, // Estado activo
        ];
        $id= $this->request->getVar('id');

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'celular' => 'required|numeric|min_length[8]', // Agregamos la validación para números
        ]);
    
        if (!$validacion) {
            $session= session();
            $session->setFlashdata('mensaje','Revise la informacion ');


            return redirect()->back()->withInput();
            // return $this->response->redirect(site_url('/cliente'));
        }


        $cliente->update($id,$datos);

        return redirect()->to(site_url('/cliente'));
    }

    
 }
<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    // public function login()
    // {
    //     return view('usuarios/login2');
    // }

    public function register()
    {
        return view('libros/register');
    }

    public function registro()
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new UsuariosModel();
       

        // Validar los datos del formulario de registro
        if (!$this->validate('register')) {
            // Los datos de registro no son válidos, mostrar errores de validación
            return view('usuarios/register', [
                'validation' => $this->validator,
                'nombre_usuario' => $this->request->getPost('nombre_usuario'),
                'correo_electronico' => $this->request->getPost('correo_electronico')
            ]);
        }

        // Obtener los datos del formulario de registro
        $nombreUsuario = $this->request->getPost('nombre_usuario');
        $correoElectronico = $this->request->getPost('correo_electronico');
        $contrasena = (string) $this->request->getPost('contrasena');

        // Crear el nuevo usuario en la base de datos
        $datosUsuario = [
            'nombre_usuario' => $nombreUsuario,
            'correo_electronico' => $correoElectronico,
            'contrasena' => password_hash($contrasena, PASSWORD_DEFAULT), // Hashear la contraseña para mayor seguridad
            'tipo_usuario' => ($contrasena === 'pet2023') ? 'administrador' : 'cliente' // Asignar el tipo de usuario según la contraseña ingresada
        ];
        $usuariosModel->save($datosUsuario);

        // Obtener el ID del nuevo usuario creado
    $idUsuario = $usuariosModel->getInsertID();

    // Crear los datos en las tablas de cliente o administrador según el tipo de usuario
    if ($datosUsuario['tipo_usuario'] === 'administrador') {
        // Crear un nuevo administrador en la tabla de administradores
        $datosAdministrador = [
            'id_usuario' => $idUsuario,
            // Otros datos del administrador...
        ];

    } else {
        // Crear un nuevo cliente en la tabla de clientes
        $datosCliente = [
            'id_usuario' => $idUsuario,
            // Otros datos del cliente...
        ];

    }


        // Redirigir al usuario a la página de éxito o mostrar un mensaje de éxito
        return redirect()->to('libros/login');
    }

    public function inicioSesion()
    {
        // Obtener el modelo de usuarios
        $usuariosModel = new UsuariosModel();

        // Obtener los datos del formulario de inicio de sesión
        $nombreUsuario = $this->request->getPost('nombre_usuario');
        $contrasena = (string) $this->request->getPost('contrasena');

        // Obtener el usuario de la base de datos por nombre de usuario
        $usuario = $usuariosModel->obtenerUsuarioPorNombreUsuario($nombreUsuario);

        if (!$usuario || !password_verify($contrasena, $usuario['contrasena'])) {
            // Las credenciales son inválidas, mostrar mensaje de error
            return redirect()->back()->withInput()->with('error', 'Contraseña ó usuario inválido. Por favor, inténtelo de nuevo.');
        }

        // Iniciar la sesión del usuario (ejemplo utilizando la librería de sesión de CodeIgniter)
        $session = session();
        $session->set('usuario', $usuario);

        // Redirigir al usuario segun su tipo a la misma página después de iniciar sesión
        return redirect()->to('/');
    }

    public function enviarEmail(){
        $email = \Config\Services::email();

        $email->setFrom('ramos.jhonthan.951@gmail.com', 'david');
        $email->setTo('ramos.jhonthan.951@gmail.com');
        
        $email->setSubject('Prueba email');
        $email->setMessage('prueba');
        
        if($email->send()){
                echo 'si se envio papu ';
        }else {
echo 'no se pudo '; 

        }

    }
}

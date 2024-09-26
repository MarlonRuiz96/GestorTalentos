<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UsuarioController extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloUsuario');
        $this->load->helper('autenticacion');
    }


    public function index()
    {
        verificar_autenticacion($this);

        $data['data'] = $this->ModeloUsuario->getUsuario();

        $this->load->view('Usuario/ConsultarUsuario', $data);
    }

    public function GuardarCambios($id_usuario){

        $referer = $_SERVER['HTTP_REFERER'];

        $nuevoNombre = $this->input->post('editNombre');
        $nuevaPuesto = $this->input->post('editPuesto');


        $this->ModeloUsuario->ActualizarUsuario($id_usuario, $nuevoNombre, $nuevaPuesto);
        return redirect('Usuarios');


        
    }

    public function desactivarUsuario($id_usuario){
        $data['Usuario'] = $this->ModeloUsuario->bajaUsuario($id_usuario);

        $data['data'] = $this->ModeloUsuario->getUsuario();
        $this->load->view('Usuario/ConsultarUsuario', $data);    
    }

    public function AltaUsuario(){
        $this->load->view('Usuario/IngresoUsuarios');

    }

    public function CrearUsuario(){

        verificar_autenticacion($this);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $estado = "activo";





            $fecha_actual = date("Y-m-d");

            $data = array(
                'usuario' => $usuario,
                'clave' => $password,
                'estado' => $estado,



            );

            $this->ModeloUsuario->InsertarUsuario($data);

            redirect('Usuarios');
        }
    }



}

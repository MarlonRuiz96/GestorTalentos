<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'config/timezone_config.php';
class loginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarioModel'); 
    }
    public function index()
    {

        $this->load->view('Login');
    }

    public function login()
    {

        $usuario = $this->input->post('usuario');
        $clave = $this->input->post('clave');


        $this->load->model('usuarioModel');
        $usuario_valido = $this->usuarioModel->validar_usuario($usuario, $clave);


        if ($usuario_valido) {
            $id_usuario = $this->usuarioModel->obtener_id_usuario_por_nombre($usuario);
            $this->session->set_userdata('id_usuario', $id_usuario);
            $this->crear_sesion($id_usuario);
            redirect('DashboardController');
        } else {
            redirect('LoginController');
        }
    }

    private function crear_sesion($id_usuario) {
        $token = bin2hex(random_bytes(32));
        $this->load->model('SesionModel'); 
        $this->SesionModel->crear_sesion($id_usuario, $token);

        $this->input->set_cookie('token', $token, 86400); 

       
    }
}
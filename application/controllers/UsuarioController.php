<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UsuarioController extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarioModel');
        $this->load->helper('autenticacion');
    }


    public function index()
    {
        verificar_autenticacion($this);

        $data['data'] = $this->usuarioModel->getUsuario();

        $this->load->view('Usuario/ConsultarUsuario', $data);
    }
}
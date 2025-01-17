<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CandidatoModel');
        $this->load->library('correo');
    }

    public function index()
    {
        $data['contactoCorreo'] = $this->CandidatoModel->getCorreoYNombre();
        $this->load->view('Contacto/index', $data);
    }

    public function EnviarCorreo()
    {
        $asunto = $this->input->post('asunto');
        $correo = $this->input->post('correo');
        $cuerpoCorreo = $this->input->post('cuerpo');

        $datosCorreo = [
            'cuerpo' => $cuerpoCorreo
        ];

        if ($this->correo->enviarCorreo($correo, $asunto, 'Generico', $datosCorreo)) {
            echo json_encode(['status' => 'success', 'message' => 'Correo enviado con éxito.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Error al enviar el correo.']);
        }
    }
}

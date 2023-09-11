<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'config/timezone_config.php';
class DpiController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DpiModel');

    }
    public function index()
    {

        $this->load->view('Pruebas/Login');
    }

    public function login()
    {
        $this->load->model('DpiModel');

        $DPI = $this->input->post('DPI');

        $validarDPI = $this->DpiModel->VerificarDPI($DPI);

        if ($validarDPI) {
            // Si el DPI es válido, obtén más información del candidato
            $this->load->model('CandidatoModel');
            $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);

            // Luego, carga la vista con los datos del candidato
            $this->load->view('Pruebas/Login', $data);
        } else {
            redirect('LoginController');
        }


    }

    public function guardarCambios()
    {
        // Recupera los datos del formulario
        $nombre = $this->input->post('Nombres');
        $contacto = $this->input->post('Contacto');
        $DPI = $this->input->post('DPI');
        $correo = $this->input->post('Correo');
        $puesto = $this->input->post('Puesto');

        // Realiza la actualización en la base de datos
        $this->DpiModel->actualizarDatos($nombre, $contacto, $DPI, $correo, $puesto);

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);


        // Redirecciona a la vista principal u otra página de confirmación
        $this->load->view('Pruebas/Login', $data);
    }


    public function RealizarPruebas($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); //obtengo todos los campos del candidato
        $temperamento = $data['Candidato']->temperamento;

        if ($temperamento) {

            $this->load->view('Pruebas/Temperamento', $data);



        } else {
            $this->load->view('Pruebas/Login', $data);

        }




       }

public function temperamento($idCandidatofk){

    $posicion = $this->input->post('respuesta_posicion');

    $respuesta = $this->input->post('respuesta');
    
    $this->DpiModel->agregarTemperamento($idCandidatofk,$respuesta,$posicion);

    return('Pruebas/Login');



}




}
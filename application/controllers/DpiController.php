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


        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato


        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $data['Formulario'] = $this->DpiModel->dataTemperamentos($indice);

        $temperamentoActivo = $data['Candidato']->temperamento;


        if ($temperamentoActivo && $indice < 41) {

            $this->load->view('Pruebas/Temperamento', $data); // Cargar la vista de la prueba de temperamentos
            $this->DpiModel->actualizarTemporal($DPI, $indice);

        } else {
            $this->load->view('Pruebas/Login', $data); // Cargar la vista de inicio de sesión
        }
    }

    public function sanguineo($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;

        $personalidad = $aspectopersonalidad->P4;


        $tipo = "D";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }






        $puntosactual = $data['Candidato']->sanguineo; //pbtener el dato actual

        $this->DpiModel->actualizarSanguineo($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }

    public function melancolico($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;


        $personalidad = $aspectopersonalidad->P1;

        $tipo = "A";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }


        $puntosactual = $data['Candidato']->melancolico; //pbtener el dato actual

        $this->DpiModel->actualizarMelancolico($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }
    public function flematico($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;


        $personalidad = $aspectopersonalidad->P3;

        $tipo = "C";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }
        $puntosactual = $data['Candidato']->flematico; //pbtener el dato actual

        $this->DpiModel->actualizarFlematico($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }

    public function colerico($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;


        $personalidad = $aspectopersonalidad->P2;

        $tipo = "B";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }
        $puntosactual = $data['Candidato']->colerico; //pbtener el dato actual

        $this->DpiModel->actualizarColerico($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }





}
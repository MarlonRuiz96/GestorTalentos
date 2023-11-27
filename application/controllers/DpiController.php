<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'config/timezone_config.php';
class DpiController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DpiModel');
        $this->load->model('CandidatoModel');


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


    public function pruebaBriggs($DPI)
    {
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; //obtengo el id del candidato segun su dpi que recibo antes


        if ($data['Candidato']->Briggs === '1') {
            $this->load->view('Pruebas/Briggs', $data);
        } else {
            $this->load->view('Pruebas/Login', $data);
        }
    }

    public function procesarRespuestas()
    {

        $DPI = $this->input->post('DPI'); // Obtén el DPI desde el formulario
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; // Obtén el id del candidato

        // Verifica las respuestas del formulario y actualiza la tabla según corresponda
        if ($this->input->post('respuesta1') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
        }
        if ($this->input->post('respuesta2') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
        }
        if ($this->input->post('respuesta3') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
        }
        if ($this->input->post('respuesta4') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
        }
        if ($this->input->post('respuesta5') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
        }
        if ($this->input->post('respuesta6') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
        }
        if ($this->input->post('respuesta7') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
        }
        if ($this->input->post('respuesta8') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
        }
        if ($this->input->post('respuesta9') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
        }
        if ($this->input->post('respuesta10') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
        }
        if ($this->input->post('respuesta11') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
        }
        if ($this->input->post('respuesta12') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
        }
        if ($this->input->post('respuesta13') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
        }
        if ($this->input->post('respuesta14') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
        }
        if ($this->input->post('respuesta15') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
        }
        if ($this->input->post('respuesta16') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
        }
        if ($this->input->post('respuesta17') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
        }
        if ($this->input->post('respuesta18') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
        }
        if ($this->input->post('respuesta19') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
        }
        if ($this->input->post('respuesta20') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
        }

        if ($this->input->post('respuesta21') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'racional');
        }
        if ($this->input->post('respuesta22') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'racional');
        }
        if ($this->input->post('respuesta23') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'racional');
        }
        if ($this->input->post('respuesta24') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'racional');
        }
        if ($this->input->post('respuesta25') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'racional');
        }
        if ($this->input->post('respuesta26') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
        }
        if ($this->input->post('respuesta27') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
        }
        if ($this->input->post('respuesta28') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
        }
        if ($this->input->post('respuesta29') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
        }
        if ($this->input->post('respuesta30') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
        }
        if ($this->input->post('respuesta31') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
        }
        if ($this->input->post('respuesta32') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
        }
        if ($this->input->post('respuesta33') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
        }
        if ($this->input->post('respuesta34') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
        }
        if ($this->input->post('respuesta35') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
        }
        if ($this->input->post('respuesta36') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
        }
        if ($this->input->post('respuesta37') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
        }
        if ($this->input->post('respuesta38') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
        }
        if ($this->input->post('respuesta39') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
        }
        if ($this->input->post('respuesta40') == 'x') {
            $this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
        }
                
        

        $this->CandidatoModel->desactivarbriggs($idCandidato);

        //esta es la nueva data con el briggs desactivado
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $this->load->view('Pruebas/Login', $data);

    }




    public function RealizarPruebas($DPI)
    {


        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato; //obtengo el id del candidato segun su dpi que recibo antes
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $data['Formulario'] = $this->DpiModel->dataTemperamentos($indice);

        $temperamentoActivo = $data['Candidato']->temperamento;


        if ($temperamentoActivo && $indice < 41) {

            $this->load->view('Pruebas/Temperamento', $data); // Cargar la vista de la prueba de temperamentos
            $this->DpiModel->actualizarTemporal($DPI, $indice);


        } else {
            $this->CandidatoModel->desactivarTemperamento($idCandidato);

            $this->load->view('Pruebas/Login', $data);
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
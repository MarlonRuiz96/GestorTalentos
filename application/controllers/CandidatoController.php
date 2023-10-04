<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CandidatoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CandidatoModel');
        $this->load->helper('autenticacion');
    }


    public function indexConsulta()
    {
        verificar_autenticacion($this);
        $data['prueba_data'] = $this->CandidatoModel->getCandidato();
        $this->load->view('Candidato/ConsultaCandidato', $data);
    }

    public function indexAlta()
    {
        verificar_autenticacion($this);
        $this->load->view('Candidato/IngresarCandidato');
    }
    public function CrearCandidato()
    {
        verificar_autenticacion($this);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $nombres = "";
            $Puesto = "";
            $DPI = $this->input->post('DPI');
            $Temperamento =0;
            $Contacto ="";  
            $correo = "";

          

         
            $fecha_actual = date("Y-m-d");

            $data = array(
                'Nombres' => $nombres,
                'Puesto' => $Puesto,
                'DPI' => $DPI,
                'temperamento' =>$Temperamento,
                'Contacto' => $Contacto,
                'Correo' => $correo,
                'fecha_crear' => $fecha_actual,

            );
            
            $this->CandidatoModel->InsertarCandidato($data);

            redirect('Candidatos');
        }

    }

    public function GuardarCambios($idCandidato)
    {

        $referer = $_SERVER['HTTP_REFERER'];

        $nuevoNombre = $this->input->post('editNombre');
        $nuevaPuesto = $this->input->post('editPuesto');
        $nuevoConctacto = $this->input->post('editDPI');
        $nuevoCorreo = $this->input->post('editCorreo');

        $this->CandidatoModel->ActualizarCandidato($idCandidato, $nuevoNombre, $nuevaPuesto, $nuevoConctacto, $nuevoCorreo);
        return redirect('Candidatos');


    }
    public function VerCandidato($idCandidato)
    {
        $data['candidato_data'] = $this->CandidatoModel->getCandidatoPorId($idCandidato);
        $data['dataTemperamento'] = $this->CandidatoModel->getDatosPrueba($idCandidato);
        $IdCandidato = $data['candidato_data']->idCandidato;

        $data['FortalezaA']= $this->CandidatoModel->FortalezaA($IdCandidato);
        $data['DebilidadA']= $this->CandidatoModel->DebilidadA($IdCandidato);

        $data['FortalezaB']= $this->CandidatoModel->FortalezaB($IdCandidato);
        $data['DebilidadB']= $this->CandidatoModel->DebilidadB($IdCandidato);

        $data['FortalezaC']= $this->CandidatoModel->FortalezaC($IdCandidato);
        $data['DebilidadC']= $this->CandidatoModel->DebilidadC($IdCandidato);

        $data['FortalezaD']= $this->CandidatoModel->FortalezaD($IdCandidato);
        $data['DebilidadD']= $this->CandidatoModel->DebilidadD($IdCandidato);

        $this->load->view('Candidato/ConsultarPerfil', $data);
    }

    

    public function guardarNotas()
    {

        $DPI = $this->input->post('DPI');
        $notas = $this->input->post('notas');

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato =$data['Candidato']->idCandidato;


        $this->CandidatoModel->guardarAnotaciones($idCandidato, $notas);

        $this->VerCandidato($idCandidato);



    }


}

?>
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PlazaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Cargar el helper de cookies
        $this->load->model('DpiModel');
        $this->load->model('CandidatoModel');
        $this->load->model('PlazasModel');

    }

    public function index()
    {
        $data['dataplaza'] = $this->PlazasModel->getPlazas();
        $this->load->view('Plaza/index', $data);
    }

    public function login()
    {
        // Obtener el código de la plaza desde el formulario
        $codigo = $this->input->post('codigo');
    
        // Verificar si el código de la plaza existe en la base de datos
        $datosPlaza = $this->PlazasModel->VerificarCodigoPlaza($codigo);

        $obtenerData = $this->PlazasModel->GetPlazaCodigo($codigo);
        $dataPlazas['plazas'] = $obtenerData;

    
        if ($datosPlaza) {
            // Cargar el helper de cookies
            $this->load->helper('cookie');
    
            // Crear un array con los datos que quieres almacenar en la cookie
            $data = array(
                'codigo_plaza' => $codigo, // Código de la plaza
                'pruebas' => FALSE,        // Estado inicial de pruebas
                'solicitud' => TRUE,       // Estado inicial de solicitud
                'dpi' => ''                // Campo para DPI, inicialmente vacío
            );
    
            // Convertir el array a JSON
            $jsonData = json_encode($data);
    
            // Establecer la cookie con el JSON
            $cookie = array(
                'name'   => 'codigo_plaza', // Nombre de la cookie
                'value'  => $jsonData,     // Valor en formato JSON
                'expire' => '86500',       // Tiempo de expiración en szegundos
                'path'   => '/',           // Accesible en todo el dominio
                'secure' => FALSE          // TRUE si usas HTTPS
            );
            set_cookie($cookie);
    
            
            // Redirigir al controlador SolicitudEmpleoController
            redirect('Plaza');
        } else {
            // Si el código de la plaza no es válido, redirigir al login
            redirect('LoginController');
        }
    }
    


    public function getPlazas()
    {

        $data['plazas'] = $this->PlazasModel->getPlazas();

        return $data;
    }

    public function vistaIngresarPlaza()
    {
        $this->load->view('Plaza/ingreso');
    }

    public function guardarPlaza()
    {
        // Generar el código
        $codigo = 'PLZ-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));

        // Capturar datos del formulario
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion'),
            'requisitos' => $this->input->post('requisitos'),
            'salario' => $this->input->post('salario'),
            'ubicacion' => $this->input->post('ubicacion'),
            'estado' => $this->input->post('estado'),
            'codigo' => $codigo,
            'temperamento' => $this->input->post('temperamento') ? 'si' : 'no',
            'Briggs' => $this->input->post('Briggs') ? 'si' : 'no',
            'Valanti' => $this->input->post('Valanti') ? 'si' : 'no',
            'fp16' => $this->input->post('fp16') ? 'si' : 'no',
            'cleaver' => $this->input->post('cleaver') ? 'si' : 'no'
        );

        // Guardar datos en la base de datos
        $this->db->insert('plazas_trabajo', $data);

        // Redirigir o mostrar mensaje
        redirect('Plazas'); // Ajusta según tu flujo
    }


    public function guardarCambios($id)
    {


        // Recopilar los datos del formulario
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion'),
            'requisitos' => $this->input->post('requisitos'),
            'salario' => $this->input->post('salario'),
            'ubicacion' => $this->input->post('ubicacion'),
            'estado' => $this->input->post('estado'),
            'codigo' => $this->input->post('codigo')
        );

        // Actualizar los datos de la plaza
        $this->PlazasModel->actualizarPlaza($id, $data);

        // Redirigir al listado con un mensaje
        $this->session->set_flashdata('success', 'Plaza actualizada correctamente.');
        redirect('PlazasController/index');
    }

    private function generarCodigoUnico()
    {
        return 'PLZ-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));
    }



}

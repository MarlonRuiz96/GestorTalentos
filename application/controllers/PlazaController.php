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
    

    public function getPlazas(){

        $data['plazas']= $this->PlazasModel->getPlazas();

        return $data;
    }

    public function vistaIngresarPlaza ()
    {
        $this->load->view('Plaza/ingreso');
    }

    public function guardarPlaza()
{

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
	$this->PlazasModel->insertarPlaza($data);;

    // Redirigir al listado de plazas con un mensaje de éxito
    $this->session->set_flashdata('success', 'Plaza creada exitosamente.');
    redirect('Plazas');
}

	public function guardarCambios($id)
	{
		// Recopilar los datos del formulario
		$nuevoTitulo = $this->input->post('titulo');
		$nuevaDescripcion = $this->input->post('descripcion');
		$nuevosRequisitos = $this->input->post('requisitos');
		$nuevoSalario = $this->input->post('salario');
		$nuevaUbicacion = $this->input->post('ubicacion');
		$nuevoEstado = $this->input->post('estado');
		$nuevoCodigo = $this->input->post('codigo');

		// Actualizar los datos de la plaza
		$this->PlazasModel->actualizarPlaza($id, $nuevoTitulo, $nuevaDescripcion, $nuevosRequisitos, $nuevoSalario, $nuevaUbicacion, $nuevoEstado, $nuevoCodigo);

		// Redirigir al listado con un mensaje
		$this->session->set_flashdata('success', 'Plaza actualizada correctamente.');
		redirect('Plazas');
	}




}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SolicitudEmpleoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Cargar el helper de cookies
        $this->load->helper('cookie');
		$this->load->model('DpiModel');
		$this->load->model('CandidatoModel');
		$this->load->model('PlazasModel');


    }

	public function index()
	{
		// Obtener el valor de la cookie 'codigo_plaza'
		$cookie = get_cookie('codigo_plaza', TRUE);
	
		if ($cookie) {
			// Decodificar el JSON de la cookie
			$cookieData = json_decode($cookie, TRUE);
	
			if (isset($cookieData['codigo_plaza'])) {
				// Extraer el código de la plaza del JSON
				$codigoPlaza = $cookieData['codigo_plaza'];
	
				// Cargar los datos de la plaza usando el código
				$data['plaza'] = $this->PlazasModel->VerificarCodigoPlaza($codigoPlaza);
	
				// Pasar también el código de la plaza a la vista (opcional)
				$data['codigo_plaza'] = $codigoPlaza;
	
				// Cargar la vista con los datos
				$this->load->view('Pruebas/Login', $data);
			} else {
				// Si el código de la plaza no está en el JSON, redirigir al controlador de login
				redirect('LoginController');
			}
		} else {
			// Si la cookie no existe, redirigir al controlador de login
			redirect('LoginController');
		}
	}
	

}

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

    }

	public function index()
	{
		// Obtener el valor de la cookie 'dpi'
		$cookie = get_cookie('dpi', TRUE);

		if ($cookie) {
			// Decodificar el JSON de la cookie
			$cookieData = json_decode($cookie, TRUE);

			if (isset($cookieData['dpi'])) {
				// Extraer el DPI del JSON
				$dpi = $cookieData['dpi'];

				// Cargar los datos del candidato usando el DPI
				$data['candidato'] = $this->DpiModel->VerificarDPI($dpi);

				// Pasar también el DPI a la vista (opcional)
				$data['dpi'] = $dpi;

				// Cargar la vista con los datos
				$this->load->view('Pruebas/Login', $data);
			} else {
				// Si el DPI no está en el JSON, redirigir al controlador de login
				redirect('LoginController');
			}
		} else {
			// Si la cookie no existe, redirigir al controlador de login
			redirect('LoginController');
		}
	}

}

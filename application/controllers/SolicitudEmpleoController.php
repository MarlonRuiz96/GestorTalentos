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

			if (isset($cookieData['codigo_plaza']) && isset($cookieData['solicitud'])) {
				// Extraer el código de la plaza del JSON
				$codigoPlaza = $cookieData['codigo_plaza'];

				// Validar si el código de la plaza existe en la base de datos
				$plaza = $this->PlazasModel->VerificarCodigoPlaza($codigoPlaza);

				if ($plaza) {
					// Si la plaza existe y 'solicitud' es true, pasar los datos a la vista
					$data['plaza'] = $plaza;
					$data['codigo_plaza'] = $codigoPlaza;
					$this->load->view('Solicitud/index', $data);
				} else {
					// Si la plaza no existe o 'solicitud' no es true, redirigir a 'Solicitud/index.php'
					$this->load->view('Solicitud/index', $data);
				}
			} else {
				// Si 'codigo_plaza' o 'solicitud' no están definidos en la cookie, redirigir a 'Solicitud'
				$this->load->view('Solicitud/index', $data);
			}
		} else {
			// Si la cookie no existe, redirigir a 'Solicitud'
			redirect('LoginController');
		}
	}

	public function llenarSolicitud()
	{

		// Obtener el valor de la cookie 'codigo_plaza'
		$cookie = get_cookie('codigo_plaza', TRUE);

		if ($cookie) {
			// Decodificar el JSON de la cookie
			$cookieData = json_decode($cookie, TRUE);

			if (isset($cookieData['codigo_plaza']) && isset($cookieData['solicitud'])) {
				// Extraer el código de la plaza del JSON
				$codigoPlaza = $cookieData['codigo_plaza'];

				// Validar si el código de la plaza existe en la base de datos
				$plaza = $this->PlazasModel->VerificarCodigoPlaza($codigoPlaza);

				if ($plaza && $cookieData['solicitud'] === true) {
					// Si la plaza existe y 'solicitud' es true, pasar los datos a la vista
					$data['plaza'] = $plaza;
					$data['codigo_plaza'] = $codigoPlaza;
					$this->load->view('Pruebas/Login');
				} else {
					// Si la plaza no existe o 'solicitud' no es true, redirigir a 'Solicitud/index.php'
					$this->session->set_flashdata('error', 'La solicitud de empleo ya fue llenada, debe continuar con las pruebas');

					redirect('Plaza');

				}
			} else {
				// Si 'codigo_plaza' o 'solicitud' no están definidos en la cookie, redirigir a 'Solicitud'
				redirect('Plaza');
			}
		} else {
			// Si la cookie no existe, redirigir a 'Solicitud'
            redirect('LoginController');
		}
	}




}

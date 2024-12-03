<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PruebasController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Cargar el helper de cookies
		$this->load->helper('cookie');

		$this->load->model('DpiModel');

	}

	public function index()
	{
		// Obtener la cookie 'dpi'
		$cookie = get_cookie('dpi', TRUE);

		if ($cookie) {
			// Decodificar el JSON almacenado en la cookie
			$cookieData = json_decode($cookie, TRUE);

			// Verificar si el 'dpi' está presente en la cookie
			if (isset($cookieData['dpi'])) {
				// Extraer el DPI del JSON
				$dpi = $cookieData['dpi'];

				// Cargar el modelo
				$this->load->model('DpiModel');

				// Obtener los datos del candidato usando el DPI
				$datosCandidato = $this->DpiModel->VerificarDPI($dpi);

				if ($datosCandidato) {
					// Verificar si 'solicitudEmpleo' es igual a 1
					if ($datosCandidato->solicitudEmpleo == 1) {
						// Pasar los datos del candidato a la vista
						$data['candidato'] = $datosCandidato;
						$this->load->view('Pruebas/pruebas', $data);
					} else {
						// Si 'solicitudEmpleo' no es 1, redirigir al controlador 'Solicitud'
						redirect('Solicitud');
					}
				} else {
					// Si no se encontró el candidato, redirigir al controlador 'Solicitud'
					redirect('Solicitud');
				}
			} else {
				// Si el DPI no está en la cookie, redirigir al controlador 'Solicitud'
				redirect('Solicitud');
			}
		} else {
			// Si la cookie no existe, redirigir al controlador 'Solicitud'
			redirect('Solicitud');
		}
	}




	// Método para actualizar el valor de 'pruebas' en la cookie
	public function actualizarPruebas()
	{
		// Obtener la cookie 'dpi'
		$cookie = get_cookie('dpi', TRUE);

		if ($cookie) {
			// Decodificar el JSON almacenado en la cookie
			$cookieData = json_decode($cookie, TRUE);

			if (isset($cookieData['dpi'])) {
				// Extraer el DPI del JSON
				$dpi = $cookieData['dpi'];

				// Actualizar el valor de 'pruebas' en el array de la cookie
				$cookieData['pruebas'] = TRUE;

				// Volver a guardar la cookie con los datos actualizados
				$nuevaCookie = array(
					'name'   => 'dpi',
					'value'  => json_encode($cookieData),
					'expire' => '86500', // Tiempo de expiración
					'path'   => '/',     // Accesible en todo el dominio
					'secure' => FALSE    // TRUE si usas HTTPS
				);

				set_cookie($nuevaCookie);

				// Cargar el modelo si no está cargado ya
				$this->load->model('DpiModel');

				// Llamar a la función del modelo para actualizar 'solicitudEmpleo'
				$this->DpiModel->actualizarSolicitudEmpleo($dpi);

				// Redireccionar a la página deseada
				redirect('Solicitud');
			} else {
				echo "El DPI no está presente en la cookie.";
			}
		} else {
			echo "La cookie no existe.";
		}
	}

}

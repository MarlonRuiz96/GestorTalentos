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
		$this->load->model('PlazasModel');


	}

	public function index()
	{
		// Obtener la cookie 'codigo_plaza'
		$cookie = get_cookie('codigo_plaza', TRUE);
	
		if ($cookie) {
			// Decodificar el JSON almacenado en la cookie
			$cookieData = json_decode($cookie, TRUE);
	
			// Verificar si 'pruebas' es true y 'solicitud' es false
			if (isset($cookieData['pruebas']) && $cookieData['pruebas'] === true &&
				isset($cookieData['solicitud']) && $cookieData['solicitud'] === false) {
				
				// Validar si el código de la plaza existe en la base de datos
				$codigoPlaza = $cookieData['codigo_plaza'];
				$plaza = $this->PlazasModel->VerificarCodigoPlaza($codigoPlaza);
	
				if ($plaza) {
					$data['pruebas'] = $plaza; // Pasar datos válidos a la vista
					$this->load->view('Pruebas/Pruebas', $data);
				} else {
					// Si no se encuentra la plaza, redirigir o manejar el error
					redirect('Plaza');
				}
			} else {
				// Si no se cumplen las condiciones, redirigir
				redirect('Plaza');
			}
		} else {
			// Si la cookie no existe, redirigir
			redirect('Plaza');
		}
	}
	
	
	




	// Método para actualizar el valor de 'pruebas' en la cookie
	public function actualizarPruebas()
	{
		// Obtener la cookie 'dpi'
		$cookie = get_cookie('codigo-plaza', TRUE);

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

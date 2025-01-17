<?php

defined('BASEPATH') or exit('No direct script access allowed');
class AspirantesController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AspirantesModel');
		$this->load->helper('autenticacion');
		$this->load->helper('cookie');

	}


	public function index()
	{

	}

	public function getAspirantes($codigoPlaza)

	{
		verificar_autenticacion($this);

		$data['aspirantes']= $this->AspirantesModel->getAspirantes($codigoPlaza);

		$this->load->view('Aspirantes/index', $data);



	}

}

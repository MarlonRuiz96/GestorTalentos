<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'config/timezone_config.php';
class loginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model('UsuarioModel'); 
    }
    public function index() {

        $this->load->view('Login');
    }
}
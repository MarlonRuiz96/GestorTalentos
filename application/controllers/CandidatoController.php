<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CandidatoController extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('CandidatoModel');
    $this->load->helper('autenticacion');
}


public function indexConsulta() {
    verificar_autenticacion($this);
    $data['prueba_data'] = $this->CandidatoModel->getCandidato();
    //$data['categorias'] = $this->ProductoModel->getCategoria();
    $this->load->view('Candidato/ConsultaCandidato', $data);
}

public function indexAlta() {
    verificar_autenticacion($this);
    $this->load->view ('Candidato/IngresarCandidato');
}  
public function CrearCandidato(){
    verificar_autenticacion($this);

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $nombres = $this->input->post('nombreC');
        $direccion = $this->input->post('Direccion');
        $contacto = $this->input->post('Telefono');
        $correo = $this->input->post('email');


        $fecha_actual = date("Y-m-d");

        $data = array(
            'Nombres' => $nombres,
            'Direccion' => $direccion,
            'Contacto' => $contacto,
            'Correo' => $correo,
            'fecha_crear' => $fecha_actual,
           
        );
        $this->CandidatoModel->InsertarCandidato($data);
        redirect('Candidatos');
    }

}

public function GuardarCambios($idCandidato){

        $referer = $_SERVER['HTTP_REFERER'];
    
        $nuevoNombre = $this->input->post('editNombre');
        $nuevaDireccion = $this->input->post('editDireccion');
        $nuevoConctacto = $this->input->post('editContacto');
        $nuevoCorreo = $this->input->post('editCorreo');
        
        $this->CandidatoModel->ActualizarCandidato($idCandidato, $nuevoNombre, $nuevaDireccion, $nuevoConctacto,$nuevoCorreo);
        return redirect('Candidatos');
    

}
}

?>
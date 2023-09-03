<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoModel extends CI_Model {

    public function getCandidato() {
        $estado = "Activo";
        $this->db->select('c.idCandidato, c.Nombres,c.Direccion , c.Contacto, c.Correo');
        $this->db->from('candidato c');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); 
        } else {
            return array();
        }
    }

    

   
    public function InsertarCandidato($data) {
        $this->db->insert('candidato', $data);
    }

    public function ActualizarCandidato($idCandidato, $nuevoNombre, $nuevaDireccion, $nuevoConctacto,$nuevoCorreo)
{
    $datosActualizados = array(
        'Nombres' => $nuevoNombre,
        'Direccion' => $nuevaDireccion,
        'Contacto' => $nuevoConctacto,
        'Correo' => $nuevoCorreo,
       
    );

    $this->db->where('idCandidato', $idCandidato);
    $this->db->update('candidato', $datosActualizados);
}    


}
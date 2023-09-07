<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CandidatoModel extends CI_Model
{

    public function getCandidato()
    {
        $estado = "Activo";
        $this->db->select('c.idCandidato, c.Nombres,c.Direccion , c.Contacto, c.Correo');
        $this->db->from('Candidato c');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }




    public function InsertarCandidato($data)
{
    // Insertamos los datos en la tabla candidatos
    $this->db->insert('Candidato', $data);

    // Obtenemos el id del candidato recién creado
    $idCandidato = $this->db->insert_id();

    // Insertamos los datos en la tabla temperamento
    $dataTemperamento = array(
        'melancolico' =>0,
        'flematico' => 0,
        'colerico' => 0,
        'sanguineo' => 0,
        'idCandidatofk' => $idCandidato,
    );

    $this->db->insert('temperamento', $dataTemperamento);
}

    public function ActualizarCandidato($idCandidato, $nuevoNombre, $nuevaDireccion, $nuevoConctacto, $nuevoCorreo)
    {
        $datosActualizados = array(
            'Nombres' => $nuevoNombre,
            'Direccion' => $nuevaDireccion,
            'Contacto' => $nuevoConctacto,
            'Correo' => $nuevoCorreo,

        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Candidato', $datosActualizados);
    }
    public function getCandidatoPorId($idCandidato)
    {
        $this->db->select('idCandidato, Nombres, Direccion, Contacto, Correo');
        $this->db->from('Candidato');
        $this->db->where('idCandidato', $idCandidato);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }

    }

    public function getDatosPrueba($idCandidato)
    {
        $this->db->select('idTemperamento, melancolico, flematico, colerico, sanguineo');
        $this->db->from('temperamento');
        $this->db->where('idCandidatofk', $idCandidato);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }

    }
    

}
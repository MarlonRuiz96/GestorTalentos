<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CandidatoModel extends CI_Model
{

    public function getCandidato()
    {
        $estado = "Activo";
        $this->db->select('c.idCandidato, c.Nombres,c.Puesto , c.Contacto, c.Correo, c.temperamento');
        $this->db->from('Candidato c');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

   






    public function InsertarCandidato($data) //Insertar 0 en los temperamentos
    {
        // Insertamos los datos en la tabla candidatos
        $this->db->insert('Candidato', $data);

        // Obtenemos el id del candidato recién creado
        $idCandidato = $this->db->insert_id();

        $fecha_actual = date("Y-m-d");

        // Insertamos los datos en la tabla temperamento
        $dataTemperamento = array(
            'melancolico' => 0,
            'flematico' => 0,
            'colerico' => 0,
            'sanguineo' => 0,
            'idCandidatofk' => $idCandidato,
        );
        $dataCandidato = array(
            'Nombres' => "",
            'Puesto' => "",
            'DPI' => "",
            'temperamento' => 0,
            'Contacto' => "",
            'Correo' => "",
            'fecha_crear' => $fecha_actual,
            'Temporal'=> 1,

        );

        $this->db->insert('temperamento', $dataTemperamento);
    }

    public function ActualizarCandidato($idCandidato, $nuevoNombre, $nuevaPuesto, $nuevoConctacto, $nuevoCorreo)
    {
        $datosActualizados = array(
            'Nombres' => $nuevoNombre,
            'Puesto' => $nuevaPuesto,
            'Contacto' => $nuevoConctacto,
            'Correo' => $nuevoCorreo,

        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Candidato', $datosActualizados);
    }
    public function getCandidatoPorId($idCandidato)
    {
        $this->db->select('idCandidato, Nombres, Puesto, Contacto, Correo, notas, DPI');
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
        $this->db->select('melancolico, colerico, flematico,sanguineo');
        $this->db->from('Candidato');
        $this->db->where('idCandidato', $idCandidato);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }

    }

   
    
    public function masGrande($idCandidato) {
        $query = $this->db->query("
            SELECT 
                idCandidato,
                CASE GREATEST(melancolico, colerico, flematico, sanguineo)
                    WHEN melancolico THEN 'melancolico'
                    WHEN colerico THEN 'colerico'
                    WHEN flematico THEN 'flematico'
                    WHEN sanguineo THEN 'sanguineo'
                    ELSE 'Empate'
                END AS temperamento_mas_grande
            FROM 
                candidato
            WHERE idCandidato = $idCandidato
        ");

        return $query->row(); // Retorna una sola fila con el resultado
    }

    
  

    


    
    
    public function VerificarDPI($DPI)
    {
        $this->db->select('idCandidato, Nombres, Puesto, DPI, Contacto, Correo, temperamento,Temporal, sanguineo, melancolico, flematico, colerico, notas');
        $this->db->from('Candidato');
        $this->db->where('DPI', $DPI);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }

    }
    public function guardarAnotaciones($idCandidato, $notas) {
        // Actualiza las notas del candidato en la base de datos
        $this->db->where('idCandidato', $idCandidato);
        $data = array(
            'notas' => $notas
        );
        $this->db->update('Candidato', $data);

        // Verifica si la actualización fue exitosa
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function activarTemperamento($idCandidato)
    {
      // Actualiza el estado de la prueba de temperamentos a 1
      $data = array(
        'temperamento' => 1
      );
  
      $this->db->where('idCandidato', $idCandidato);
      $this->db->update('Candidato', $data);
  
      return $this->db->affected_rows();
    }

    public function desactivarTemperamento($idCandidato)
    {
      // Actualiza el estado de la prueba de temperamentos a 1
      $data = array(
        'temperamento' => 0
      );
  
      $this->db->where('idCandidato', $idCandidato);
      $this->db->update('candidato', $data);
  
      return $this->db->affected_rows();
    }
    
}
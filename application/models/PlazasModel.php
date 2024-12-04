<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PlazasModel extends CI_Model
{
    public function getPlazas()
    {
        $this->db->select('*');               // Selecciona todas las columnas
        $this->db->from('plazas_trabajo');    // Tabla de las plazas
        $query = $this->db->get();            // Ejecuta la consulta
        return $query->result();              // Devuelve un array de resultados
    }

    public function insertarPlaza($data)
{
    return $this->db->insert('plazas_trabajo', $data);
}

    
}
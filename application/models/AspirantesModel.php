<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AspirantesModel extends CI_Model
{


	/**
	 * Obtener todos los candidatos que coincidan con el plaza_id
	 *
	 * @param string $plaza_id El código de la plaza para buscar a los aspirantes
	 * @return array|null Lista de candidatos o null si no hay resultados
	 */
	public function getAspirantes($plaza_id)
	{
		$this->db->select('
            id, 
            primer_nombre, 
            segundo_nombres, 
            primer_apellido, 
            segundo_apellido, 
            apellido_casada, 
            fecha_nacimiento, 
            edad_actual, 
            genero, 
            estado_civil, 
            documento_identificacion, 
            numero_documento, 
            lugar_extension, 
            tipo_licencia, 
            numero_licencia, 
            nit, 
            profesion, 
            numero_colegiado, 
            telefono_casa, 
            telefono_movil, 
            correo, 
            emergencia_contacto, 
            parentesco, 
            telefono_localizacion, 
            direccion_residencia, 
            zona_kilometro, 
            colonia, 
            municipio, 
            departamento, 
            firma, 
            fecha_hoy, 
            plaza_id
        ');

		$this->db->from('applicants');
		$this->db->where('plaza_id', $plaza_id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Retorna una lista de objetos con los datos de los candidatos
		} else {
			return null; // No se encontraron resultados
		}
	}
}

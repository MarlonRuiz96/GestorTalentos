<?php
class UsuarioModel extends CI_Model {
    public function validar_Usuario($Usuario, $clave) {
        $this->db->where('Usuario', $Usuario);
        $this->db->where('clave', $clave);
        $query = $this->db->get('Usuario');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_Usuario;
        } else {
            return false;
        }
    }
    public function obtener_id_Usuario_por_nombre($Usuario) {
        $this->db->where('Usuario', $Usuario);
        $query = $this->db->get('Usuario');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_Usuario;
        } else {
            return false;
        }
    }

    public function obtenerTokenCandidato($token) {
        $this->db->where('Token', $token);
        $query = $this->db->get('Candidato');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->idCandidato;
        } else {
            return false;
        }
    }

    //Funcion para obtener los Usuarios activos
    public function getUsuario()
    {
      $this->db->select('id_Usuario,Usuario, clave');
      $this->db->from('Usuario');
      $this->db->where('estado', 'activo');
      $query = $this->db->get();
    
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return array();
      }
    }
    

    public function ActualizarUsuario($id_Usuario, $nuevoNombre, $nuevaPuesto){

        $datosActualizados = array(
            'Usuario' => $nuevoNombre,
            'clave' => $nuevaPuesto,
           

        );

        $this->db->where('id_Usuario', $id_Usuario);
        $this->db->update('Usuario', $datosActualizados);
    }

    public function bajaUsuario($id_Usuario) {

        $nuevoEstado = "Inactivo";
        $datosActualizados = array(
            'estado' => $nuevoEstado,
          
        );
        $this->db->where('id_Usuario', $id_Usuario);
        $this->db->update('Usuario', $datosActualizados);
    }
    public function InsertarUsuario($data) 
    {
        // Insertamos los datos en la tabla candidatos
        $this->db->insert('Usuario', $data);

      
    }

    
}


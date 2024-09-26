<?php
class UsuarioModel extends CI_Model {
    public function validar_usuario($usuario, $clave) {
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_usuario;
        } else {
            return false;
        }
    }
    public function obtener_id_usuario_por_nombre($usuario) {
        $this->db->where('usuario', $usuario);
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_usuario;
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

    //Funcion para obtener los usuarios activos
    public function getusuario()
    {
      $this->db->select('id_usuario,usuario, clave');
      $this->db->from('usuario');
      $this->db->where('estado', 'activo');
      $query = $this->db->get();
    
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return array();
      }
    }
    

    public function Actualizarusuario($id_usuario, $nuevoNombre, $nuevaPuesto){

        $datosActualizados = array(
            'usuario' => $nuevoNombre,
            'clave' => $nuevaPuesto,
           

        );

        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuario', $datosActualizados);
    }

    public function bajausuario($id_usuario) {

        $nuevoEstado = "Inactivo";
        $datosActualizados = array(
            'estado' => $nuevoEstado,
          
        );
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuario', $datosActualizados);
    }
    public function Insertarusuario($data) 
    {
        // Insertamos los datos en la tabla candidatos
        $this->db->insert('usuario', $data);

      
    }

    
}


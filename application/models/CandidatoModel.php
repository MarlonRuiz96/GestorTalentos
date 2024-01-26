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
        // Insertamos los datos en la tabla Candidatos
        $this->db->insert('Candidato', $data);

        // Obtenemos el id del Candidato recién creado
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
            'Temporal' => 1,
            'Briggs' =>0,

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
        $this->db->select('idCandidato, Nombres, Puesto, Contacto, Correo, notas, DPI, temperamento');
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
        $this->db->select('melancolico, colerico, flematico, sanguineo');
        $this->db->from('Candidato');
        $this->db->where('idCandidato', $idCandidato);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }

    }
    public function getDatosBriggs($idCandidato)
    {
        $this->db->select('extrovertido, introvertido, sensorial, intuitivo,racional,emocional,calificador,perceptivo');
        $this->db->from('Briggs');
        $this->db->where('idCandidato', $idCandidato);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }



    }

    public function getDatosValanti($idCandidato){

        $this->db->select('Verdad,Rectitud, Paz, Amor, No_violencia, verdadEmpresa, rectitudEmpresa, pazEmpresa, amorEmpresa, noViolenciaEmpresa');
        $this->db->from('valanti');
        $this->db->where('idCandidato',$idCandidato);

        $query = $this->db->get();

        if($query->num_rows()>0){
            return $query->row();
        }else {
            return null;
        }
    }



    public function masGrande($idCandidato)
    {
        $query = $this->db->query("
        SELECT 
        idCandidato,
        CASE 
            WHEN melancolico = 0 AND colerico = 0 AND flematico = 0 AND sanguineo = 0 THEN 'Nulo'
            ELSE
                CASE GREATEST(melancolico, colerico, flematico, sanguineo)
                    WHEN melancolico THEN 'melancolico'
                    WHEN colerico THEN 'colerico'
                    WHEN flematico THEN 'flematico'
                    WHEN sanguineo THEN 'sanguineo'
                    ELSE 'Empate'
                END
        END AS temperamento_mas_grande
    FROM 
        Candidato
    WHERE 
        idCandidato = $idCandidato
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
    public function guardarAnotaciones($idCandidato, $notas)
    {
        // Actualiza las notas del Candidato en la base de datos
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

    public function guardarValanti($idCandidato, $Verdad, $Rectitud, $Paz, $Amor, $NoViolencia)
    {
        // Actualiza las notas del Candidato en la base de datos
        $this->db->where('idCandidato', $idCandidato);
        $data = array(
            'verdadEmpresa' => $Verdad,
            'rectitudEmpresa' => $Rectitud,
            'pazEmpresa' => $Paz,
            'amorEmpresa' => $Amor,
            'noViolenciaEmpresa' => $NoViolencia

        );
        $this->db->update('valanti', $data);

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
        $this->db->update('Candidato', $data);

        return $this->db->affected_rows();
    }

    public function activarbriggs($idCandidato)
    {
        // Actualiza el estado de la prueba de temperamentos a 1
        $data = array(
            'Briggs' => 1
        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Candidato', $data);

        return $this->db->affected_rows();
    }

    public function desactivarbriggs($idCandidato)
    {
        // Actualiza el estado de la prueba de temperamentos a 1
        $data = array(
            'Briggs' => 0
        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Candidato', $data);

        return $this->db->affected_rows();
    }

    public function activarValanti($idCandidato)
    {
        // Actualiza el estado de la prueba de temperamentos a 1
        $data = array(
            'valanti' => 1
        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Candidato', $data);

        return $this->db->affected_rows();
    }

    public function desactivarValanti($idCandidato)
    {
        // Actualiza el estado de la prueba de temperamentos a 1
        $data = array(
            'valanti' => 0
        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Candidato', $data);

        return $this->db->affected_rows();
    }

    public function existeRegistroBriggs($idCandidato)
    {
        $this->db->where('idCandidato', $idCandidato);
        $query = $this->db->get('Briggs');
        
        return $query->num_rows() > 0; // Retorna true si hay al menos un registro para el idCandidato
    }

    public function insertarRegistroBriggs($idCandidato)
    {
        $data = array(
            'extrovertido' => 0, // Aquí deberías proporcionar el valor correspondiente para cada campo
            'introvertido' => 0,
            'sensorial' => 0,
            'intuitivo' => 0,
            'racional' => 0,
            'emocional' => 0,
            'calificador' => 0,
            'perceptivo' => 0,
            'idCandidato' => $idCandidato
        );

        $this->db->insert('Briggs', $data);
        
    }

    public function existeRegistroValanti($idCandidato)
    {
        $this->db->where('idCandidato', $idCandidato);
        $query = $this->db->get('valanti');
        
        return $query->num_rows() > 0; 
    }

    public function insertarRegistroValanti($idCandidato)
    {
        $data = array(
            'Verdad' => 0, 
            'Rectitud' => 0,
            'Paz' => 0,
            'Amor' => 0,
            'No_violencia' => 0,
            'verdadEmpresa' => 50,
            'rectitudEmpresa' => 50,
            'pazEmpresa' => 50,
            'amorEmpresa' => 50,
            'noViolenciaEmpresa' => 50,
            'idCandidato' => $idCandidato
        );

        $this->db->insert('valanti', $data);
        
    }

    public function actualizarBriggs($idCandidato, $campo) {
        // Aquí se asume que cada campo en la tabla `Briggs` representa un tipo de personalidad
        // Supongamos que la tabla `Briggs` tiene los campos: extrovertido, introvertido, sensorial, intuitivo, etc.
        
        // Asegúrate de ajustar el nombre de la tabla y los campos según tu base de datos
        $this->db->set($campo, $campo.' + 1', FALSE); // Incrementa en 1 el campo indicado
        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('Briggs');
    }

    
}
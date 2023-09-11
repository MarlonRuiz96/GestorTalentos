<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DpiModel extends CI_Model
{


    public function VerificarDPI($DPI)
    {
        $this->db->select('idCandidato, Nombres, Puesto, DPI, Contacto, Correo, temperamento');
        $this->db->from('candidato');
        $this->db->where('DPI', $DPI);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }

    }

    public function actualizarDatos($nombre, $contacto, $dpi, $correo, $puesto)
    {
        $data = array(
            'Nombres' => $nombre,
            'Contacto' => $contacto,
            'DPI' => $dpi,
            'Correo' => $correo,
            'Puesto' => $puesto
        );

        $this->db->where('DPI', $dpi); // Ajusta la condición según la clave primaria de tu tabla
        $this->db->update('candidato', $data);
    }

    public function agregarTemperamento($idCandidatofk, $respuesta, $posicion)
    {

        $temperamento = '';
        
        switch ($posicion) {
            case '1':
                $temperamento = 'Melancólico';
                break;
            case '2':
                $temperamento = 'Colérico';
                break;
            case '3':
                $temperamento = 'Flemático';
                break;
            case '4':
                $temperamento = 'Sanguíneo';
                break;
            default:
            $temperamento = 'Nada';
            break;
        }

        // Crear un arreglo de datos para la inserción
        $data = array(
            'Temperamento' => $temperamento,
            'Respuesta' => $respuesta,
            'idCandidato' => $idCandidatofk,
        );

        // Insertar los datos en la tabla 'respuesta'
        $this->db->insert('respuesta', $data);

        // Comprobar si la inserción fue exitosa
        if ($this->db->affected_rows() > 0) {
            // Éxito: la inserción se realizó correctamente
            return true;
        } else {
            // Error: la inserción falló
            return false;
        }
    }

}
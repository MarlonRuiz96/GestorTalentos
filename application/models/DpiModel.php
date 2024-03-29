<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DpiModel extends CI_Model
{


    public function VerificarDPI($DPI)
    {
        $this->db->select('idCandidato, Nombres, Puesto, DPI, Contacto, Correo, temperamento,Temporal, sanguineo, melancolico, flematico, colerico, Briggs, valanti');
        $this->db->from('Candidato');
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
        $this->db->update('Candidato', $data);
    }
    



    public function dataTemperamentos($Indice)
    {
        // Consulta para obtener los datos de la tabla de respuesta
        $this->db->select('idRespuesta,P1,P2,P3,P4');
        $this->db->from('respuesta');
        $this->db->where('idRespuesta', $Indice);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }


    public function actualizarTemporal($DPI, $indice)
    {

        $nuevovalor = $indice + 1;

        $data = array(
            'Temporal' => $nuevovalor,
        );

        $this->db->where('DPI', $DPI);
        $this->db->update('Candidato', $data);
    }

    public function actualizarSanguineo($DPI, $sanguineoActual)
    {

        $nuevovalor = $sanguineoActual + 1;

        $data = array(
            'sanguineo' => $nuevovalor,
            
        );

        $this->db->where('DPI', $DPI);
        $this->db->update('Candidato', $data);
    }

    public function actualizarColerico($DPI, $datoActual)
    {

        $nuevovalor = $datoActual + 1;

        $data = array(
            'colerico' => $nuevovalor,
        );

        $this->db->where('DPI', $DPI);
        $this->db->update('Candidato', $data);
    }
    public function actualizarFlematico($DPI, $datoActual)
    {

        $nuevovalor = $datoActual + 1;

        $data = array(
            'flematico' => $nuevovalor,
        );

        $this->db->where('DPI', $DPI);
        $this->db->update('Candidato', $data);
    }

    public function actualizarMelancolico($DPI, $datoActual)
    {

        $nuevovalor = $datoActual + 1;

        $data = array(
            'melancolico' => $nuevovalor,
        );

        $this->db->where('DPI', $DPI);
        $this->db->update('Candidato', $data);
    }


    public function IngresarFortaleza($personalidad, $idCandidato, $tipo)
    {
        // Datos a insertar en la tabla "personalidad"
        $data = array(
            'Personalidad' => $personalidad,
            'Tipo'=> $tipo,
            'idCandidato' => $idCandidato
        );

        // Insertar datos en la tabla "personalidad"
        $this->db->insert('fortaleza', $data);

        // Verificar si la inserción tuvo éxito
        return $this->db->affected_rows() > 0;
    }

    public function IngresarDebilidad($personalidad, $idCandidato, $tipo)
    {
        // Datos a insertar en la tabla "debilidad"
        $data = array(
            'Personalidad' => $personalidad,
            'Tipo'=> $tipo,

            'idCandidato' => $idCandidato
        );

        // Insertar datos en la tabla "personalidad"
        $this->db->insert('debilidad', $data);

        // Verificar si la inserción tuvo éxito
        return $this->db->affected_rows() > 0;
    }


    public function AgregarResultadosValanti($idCandidato,$verdad,$rectitud,$paz,$amor,$noViolencia){

        $data = array(
            'Verdad' => $verdad,
            'Rectitud' => $rectitud,
            'Paz' => $paz,
            'Amor' => $amor,
            'No_violencia' => $noViolencia
        );

        $this->db->where('idCandidato', $idCandidato);
        $this->db->update('valanti', $data);

        

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
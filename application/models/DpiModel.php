<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DpiModel extends CI_Model
{


	public function VerificarDPI($DPI)
	{
		$this->db->select('*');
		$this->db->from('Candidato');
		$this->db->where('DPI', $DPI);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}

	}

	public function actualizarSolicitudEmpleo($dpi)
	{
		// Datos a actualizar
		$data = array(
			'solicitudEmpleo' => 1
		);

		// Actualizar el registro donde el 'dpi' coincide
		$this->db->where('dpi', $dpi);
		$this->db->update('Candidato', $data);

		// Opcional: Verificar si la actualización fue exitosa
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			// Manejar el caso donde no se actualizó ningún registro
			return FALSE;
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
		$this->db->select('*');
		$this->db->from('respuesta');
		$this->db->where('idRespuesta', $Indice);


		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function preguntasCleaver($indice)
	{
		// Esta me sirve para obtener las características de acuerdo al índice, para ahorrar código.
		$this->db->select('*');
		$this->db->from('cleaverdata');
		$this->db->where('idCleaverData', $indice);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function Cleaver($idCandidato)
	{
		// Esta me sirve para obtener las características de acuerdo al índice, para ahorrar código.
		$this->db->select('*');
		$this->db->from('cleaver');
		$this->db->where('idCandidato', $idCandidato);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();

			// Acceder a los valores individuales
			$M1 = $row->M1;
			$M2 = $row->M2;
			$M3 = $row->M3;
			$M4 = $row->M4;
			$L1 = $row->L1;
			$L2 = $row->L2;
			$L3 = $row->L3;
			$L4 = $row->L4;

			// Calcular los valores de T1, T2, T3 y T4
			$T1 = $M1 - $L1;
			$T2 = $M2 - $L2;
			$T3 = $M3 - $L3;
			$T4 = $M4 - $L4;

			// Actualizar los valores en la base de datos
			$data = [
				'T1' => $T1,
				'T2' => $T2,
				'T3' => $T3,
				'T4' => $T4,
			];
			$this->db->where('idCandidato', $idCandidato);
			$this->db->update('cleaver', $data);

			return true; // Indicar que la actualización fue exitosa
		} else {
			return false; // Indicar que no se encontraron datos para el candidato
		}
	}

	public function obtenerValoresCleaver($idCandidato)
	{
		$this->db->select('*');
		$this->db->from('cleaver');
		$this->db->where('idCandidato', $idCandidato);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function ObtenerCampo($campo, $indice, $campo2)
	{
		$this->db->select($campo2);
		$this->db->from('metricascleaver');
		$this->db->where($campo, $indice);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row()->$campo2; // Devuelve el valor específico
		} else {
			return null;
		}
	}

	public function insertGraficaCleaver($data)
	{
		// Verificar si ya existe un registro con el mismo idCandidato
		$this->db->where('idCandidato', $data['idCandidato']);
		$query = $this->db->get('graficacleaver');

		if ($query->num_rows() > 0) {
			// Si existe, actualizamos el registro
			$this->db->where('idCandidato', $data['idCandidato']);
			$this->db->update('graficacleaver', $data);
		} else {
			// Si no existe, lo insertamos
			$this->db->insert('graficacleaver', $data);
		}
	}


	public function obtenerValorCleaver($id, $campo)
	{
		$this->db->select($campo);
		$this->db->from('cleaverdata');
		$this->db->where('idcleaverdata', $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->$campo; // Retorna el valor del campo solicitado
		} else {
			return null; // O maneja el caso en que no se encuentre el registro
		}
	}

	public function actualizarCleaver($idCandidato, $campoM, $campoL)
	{
		// Primero verificamos si existe un registro con ese idCandidato
		$this->db->select('idCandidato');
		$this->db->from('cleaver');
		$this->db->where('idCandidato', $idCandidato);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			// Si existe, realizamos la actualización
			$this->db->set($campoM, "$campoM + 1", FALSE);
			$this->db->set($campoL, "$campoL + 1", FALSE);
			$this->db->where('idCandidato', $idCandidato);
			$this->db->update('cleaver');
		} else {
			// Si no existe, insertamos un nuevo registro con los valores iniciales en 1
			$data = array(
				'idCandidato' => $idCandidato,
				$campoM => 1,
				$campoL => 1
			);

			$this->db->insert('cleaver', $data);
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
			'Tipo' => $tipo,
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
			'Tipo' => $tipo,

			'idCandidato' => $idCandidato
		);

		// Insertar datos en la tabla "personalidad"
		$this->db->insert('debilidad', $data);

		// Verificar si la inserción tuvo éxito
		return $this->db->affected_rows() > 0;
	}


	public function AgregarResultadosValanti($idCandidato, $verdad, $rectitud, $paz, $amor, $noViolencia)
	{

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

	public function actualizarBriggs($idCandidato, $campo)
	{
		// Aquí se asume que cada campo en la tabla `Briggs` representa un tipo de personalidad
		// Supongamos que la tabla `Briggs` tiene los campos: extrovertido, introvertido, sensorial, intuitivo, etc.

		// Asegúrate de ajustar el nombre de la tabla y los campos según tu base de datos
		$this->db->set($campo, $campo . ' + 1', FALSE); // Incrementa en 1 el campo indicado
		$this->db->where('idCandidato', $idCandidato);
		$this->db->update('Briggs');
	}

	public function AgregarPf($idCandidato, $datos)
	{
		// Actualizar los campos en la tabla 16pf
		$this->db->where('idCandidato', $idCandidato);
		$this->db->update('16pf', $datos);
	}
	public function guardarAplicants($datos, $table)
	{
		// Inserta los datos en la base de datos
		$this->db->insert($table, $datos);
		// Retorna el ID del registro insertado
		return $this->db->insert_id();
	}
	public function guardarDataSolicitud($datos, $table)
	{
		$this->db->insert($table, $datos);
	}

}

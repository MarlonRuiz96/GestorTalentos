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

//pendiente verificar la ffecha
		$fecha_actual = date("Y-m-d");


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
		$this->db->select('*');
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
		$this->db->select('*');
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
		$this->db->select('*');
		$this->db->from('Briggs');
		$this->db->where('idCandidato', $idCandidato);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}


	}

	public function getDatosValanti($idCandidato)
	{

		$this->db->select('*');
		$this->db->from('valanti');
		$this->db->where('idCandidato', $idCandidato);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}

	public function getDatos16pf($idCandidato)
	{

		$this->db->select('*');
		$this->db->from('16pf');
		$this->db->where('idCandidato', $idCandidato);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}

	}

	public function getDatoscleaver($idCandidato)
	{

		$this->db->select('*');
		$this->db->from('graficacleaver');
		$this->db->where('idCandidato', $idCandidato);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
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
	public function VerificarDPIPlaza($DPI, $plaza)
	{
		if (empty($DPI) || empty($plaza)) {
			return null; // Devuelve null si alguno de los valores no es válido
		}

		$this->db->select('*');
		$this->db->from('Candidato');
		$this->db->where('DPI', $DPI);
		$this->db->where('plaza', $plaza);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row(); // Retorna el objeto encontrado
		} else {
			return null; // Retorna null si no se encuentra nada
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

	public function existe16pf($idCandidato)
	{
		$this->db->where('idCandidato', $idCandidato);
		$query = $this->db->get('16pf');

		return $query->num_rows() > 0;
	}

	public function activar16pf($idCandidato)
	{
		// Actualiza el estado de la prueba de temperamentos a 1
		$data = array(
			'fp16' => 1
		);

		$this->db->where('idCandidato', $idCandidato);
		$this->db->update('Candidato', $data);

		return $this->db->affected_rows();
	}

	public function desactivarpf($idCandidato)
	{
		// Actualiza el estado de la prueba de temperamentos a 1
		$data = array(
			'fp16' => 0
		);

		$this->db->where('idCandidato', $idCandidato);
		$this->db->update('Candidato', $data);

		return $this->db->affected_rows();
	}

	public function crearregistro16pf($idCandidato)
	{
		$data = array(
			'p1' => 0,
			'p2' => 0,
			'p3' => 0,
			'p4' => 0,
			'p5' => 0,
			'p6' => 0,
			'p7' => 0,
			'p8' => 0,
			'p9' => 0,
			'p10' => 0,
			'p11' => 0,
			'p12' => 0,
			'p13' => 0,
			'p14' => 0,
			'p15' => 0,
			'p16' => 0,
			'idCandidato' => $idCandidato
		);

		$this->db->insert('16pf', $data);

	}

	public function existecleaver($idCandidato)
	{
		$this->db->where('idCandidato', $idCandidato);
		$query = $this->db->get('cleaver');

		return $query->num_rows() > 0;
	}

	public function activarCleaver($idCandidato)
	{
		// Actualiza el estado de la prueba de temperamentos a 1
		$data = array(
			'cleaver' => 1
		);

		$this->db->where('idCandidato', $idCandidato);
		$this->db->update('Candidato', $data);

		return $this->db->affected_rows();
	}

	public function desactivarcleaver($idCandidato)
	{
		// Actualiza el estado de la prueba de temperamentos a 1
		$data = array(
			'cleaver' => 0
		);

		$this->db->where('idCandidato', $idCandidato);
		$this->db->update('Candidato', $data);

		return $this->db->affected_rows();
	}

	public function crearRegistroCleaver($idCandidato)
	{
		$data = array(
			'idCandidato' => $idCandidato
		);

		$this->db->insert('cleaver', $data);

	}

	public function resetPrueba($idCandidato, $prueba)
	{

		$this->db->where('idCandidato', $idCandidato);
		$this->db->delete($prueba);


	}

	public function desactivarPrueba($idCandidato, $prueba)
	{
		if ($prueba == "temperamento") {
			$data = array(
				'Temporal' => 1,
				$prueba => 0

			);
			$this->db->where('idCandidato', $idCandidato);
			$this->db->update("Candidato", $data);
		} else {
			$data = array(
				$prueba => 0
			);

			$this->db->where('idCandidato', $idCandidato);
			$this->db->update("Candidato", $data);
		}


		return $this->db->affected_rows();
	}

	public function activarPrueba($idCandidato, $prueba)
	{
		// Actualizar el campo correspondiente en la tabla 'Candidato'
		$data = array(
			$prueba => 1 // Activar la prueba correspondiente
		);


		// Actualizamos la tabla Candidato
		$this->db->where('idCandidato', $idCandidato);
		$this->db->update("Candidato", $data);
		// Verificar y corregir el nombre de la prueba si es necesario
		if ($prueba === "fp16") {
			$prueba = "16pf";
		}
		if ($prueba === "Valanti") {
			$prueba = "valanti";
		}
		// Verificar si ya existe el registro en la tabla correspondiente ($prueba)
		$this->db->where('idCandidato', $idCandidato);
		$query = $this->db->get($prueba);

		if ($query->num_rows() == 0) {
			// Si no existe el registro, crear uno nuevo
			$dataPrueba = array(
				'idCandidato' => $idCandidato
			);

			// Insertamos el nuevo registro en la tabla correspondiente
			$this->db->insert($prueba, $dataPrueba);

			// Retornamos el número de filas afectadas para saber si se creó el registro
			return $this->db->affected_rows();
		}

		// Si ya existe, no hacemos nada
		return 0; // Retornamos 0 si no se hizo ningún cambio
	}

	public function obtenerInterpretacionCleaver($idCandidato)
	{
		// Consulta para obtener los datos de M1, M2, M3, M4, L1, L2, L3, L4, T1, T2, T3, T4 del candidato específico
		$query = $this->db->select('M1, M2, M3, M4, L1, L2, L3, L4, T1, T2, T3, T4')
			->from('graficacleaver')
			->where('idCandidato', $idCandidato)
			->get();

		// Verificar si existen resultados
		if ($query->num_rows() > 0) {
			$result = $query->row();

			// Calcular los promedios para D, I, S, y C
			$D = ($result->M1 + $result->L1 + $result->T1) / 3;
			$I = ($result->M2 + $result->L2 + $result->T2) / 3;
			$S = ($result->M3 + $result->L3 + $result->T3) / 3;
			$C = ($result->M4 + $result->L4 + $result->T4) / 3;

			// Determinar cuál es el valor más alto y asignar una interpretación
			$interpretacion = '';
			if ($D >= $I && $D >= $S && $D >= $C) {
				$interpretacion = "
Le apasionan los retos. Puede ser considerado 'descontrolado' por los demás. Siempre listo a la competencia.

Cuando algo está en juego, sale lo mejor de él. Tiene respeto por aquellos que ganan contra todas las expectativas. Se desempeña mejor cuando tiene autoridad y responsabilidad. Piensa en grande y quiere que su autoridad sea aceptada sin duda alguna.

Si no existe algún reto, puede crear alguna situación en que los haya. Trabajará largas horas, con insistencia, hasta vencer alguna situación difícil.

En su trato con la gente, es generalmente directo, positivo e incisivo. Dice lo que piensa, es seco y aún sarcástico, aunque no rencoroso.

Podrá herir a los demás sin darse cuenta. En general pertenecerá a organizaciones que buscan el logro de algún objetivo más que por el simple hecho de convivir socialmente.";
			} elseif ($I >= $D && $I >= $S && $I >= $C) {
				$interpretacion = "
Abierto, persuasivo y sociable. Generalmente optimista, puede ver algo bueno en cualquier situación.

Interesado principalmente en la gente, sus problemas y actividades. Dispuesto a ayudar a otros a promover sus proyectos así como los suyos propios.

Tiende a saltar a conclusiones y puede actuar bajo impulsos emocionales. Toma decisiones basadas en análisis superficiales de los hechos.

Debido a su confianza y aceptación indiscriminada de la gente, puede mal juzgar las habilidades de otras personas.";
			} elseif ($S >= $D && $S >= $I && $S >= $C) {
				$interpretacion = "
Generalmente amable, tranquilo y llevadero. Es poco demostrativo y controlado. Puede ocultar sus sentimientos y ser rencoroso.

Gusta de establecer relaciones amistosas cercanas con un grupo limitado de sus asociados. Se muestra satisfecho y relajado. La paciencia y la predeterminación caracterizan su comportamiento usual.

Prefiere pasar las noches en su casa más que viajando.

Funciona bien como miembro de un equipo y puede coordinar sus esfuerzos con otros mostrando ritmo y facilidad.";
			} else {
				$interpretacion = "
Es generalmente pacífico y se adapta a las situaciones con el fin de evitar antagonismos.

Siendo sensible, busca apreciación y es fácilmente herido por otros. Es humilde, leal y dócil, tratando siempre de hacer las cosas lo mejor posible.

Actúa de forma cautelosa y muy diplomática, en general es un buen candidato a promociones.

Procura llevar una vida estable y ordenada, con una mente sistemática. Procede en forma ordenada y premeditada, es preciso y atento al detalle.";
			}

			// Retornar los resultados en un arreglo, incluyendo la interpretación
			return [
				'D' => round($D, 2),
				'I' => round($I, 2),
				'S' => round($S, 2),
				'C' => round($C, 2),
				'interpretacion' => $interpretacion
			];
		} else {
			// Si no hay datos, retornar un arreglo vacío o nulo
			return null;
		}
	}




}

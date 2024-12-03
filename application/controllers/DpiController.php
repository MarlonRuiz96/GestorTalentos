<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'config/timezone_config.php';
class DpiController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DpiModel');
        $this->load->model('CandidatoModel');
		$this->load->helper('cookie');



    }
    public function index()
    {

        $this->load->view('Pruebas/Login');
    }

	public function Solicitud()
    {


        $this->load->view('Pruebas/Login');
    }

   
	public function login()
	{
		$DPI = $this->input->post('DPI');
		$datosCandidato = $this->DpiModel->VerificarDPI($DPI);
		$data['candidato'] = $datosCandidato;


		$validarDPI = $this->DpiModel->VerificarDPI($DPI);


		if ($validarDPI) {
			// Cargar el helper de cookies
			$this->load->helper('cookie');

			// Crear un array con los datos que quieres almacenar
			$data = array(
				'dpi' => $DPI,       // El DPI del usuario
				'pruebas' => FALSE,   // Estado inicial de pruebas
				'solicitud' => TRUE
			);

			// Convertir el array a JSON
			$jsonData = json_encode($data);

			// Establecer la cookie con el JSON
			$cookie = array(
				'name'   => 'dpi',         // Nombre de la cookie
				'value'  => $jsonData,     // Valor en formato JSON
				'expire' => '86500',       // Tiempo de expiración en segundos
				'path'   => '/',           // Accesible en todo el dominio
				'secure' => FALSE          // TRUE si usas HTTPS
			);
			set_cookie($cookie);

			// Redirigir al controlador SolicitudEmpleoController
			redirect('Solicitud');
		} else {
			redirect('LoginController');
		}

	}
	



	public function guardarCambios()
	{
		$nombre = $this->input->post('primer_nombre');
		$segundoNombre = $this->input->post('segundo_nombres');
		$primerApellido = $this->input->post('primer_apellido');
		$segundoApellido = $this->input->post('segundo_apellido');
		$apellidoCasada = $this->input->post('apellido_casada');
		$fechaNacimiento = $this->input->post('fecha_nacimiento');
		$edadActual = $this->input->post('edad_actual');
		$genero = $this->input->post('genero');
		$estadoCivil = $this->input->post('estado_civil');
		$documentoIdentificacion = $this->input->post('documento_identificacion');
		$numeroDocumento = $this->input->post('numero_documento');
		$lugarExtension = $this->input->post('lugar_extension');
		$tipoLicencia = $this->input->post('tipo_licencia');
		$numeroLicencia = $this->input->post('numero_licencia');
		$nit = $this->input->post('nit');
		$profesion = $this->input->post('profesion');
		$numeroColegial = $this->input->post('numero_colegiado');
		$telefonoCasa = $this->input->post('telefono_casa');
		$telefonoMovil = $this->input->post('telefono_movil');
		$correo = $this->input->post('correo');
		$emergenciaContacto = $this->input->post('emergencia_contacto');
		$parentesco = $this->input->post('parentesco');
		$telefonoLocalizacion = $this->input->post('telefono_localizacion');
		$direccionResidencia = $this->input->post('direccion_residencia');
		$zonaKilometro = $this->input->post('zona_kilometro');
		$colonia = $this->input->post('colonia');
		$municipio = $this->input->post('municipio');
		$departamento = $this->input->post('departamento');
		$firma = $this->input->post('firma');
		$fechaHoy = $this->input->post('fecha_hoy');

		// Crear el array con todos los datos para insertarlo en la tabla
		$array = [
			'primer_nombre' => $nombre,
			'segundo_nombres' => $segundoNombre,
			'primer_apellido' => $primerApellido,
			'segundo_apellido' => $segundoApellido,
			'apellido_casada' => $apellidoCasada,
			'fecha_nacimiento' => $fechaNacimiento,
			'edad_actual' => $edadActual,
			'genero' => $genero,
			'estado_civil' => $estadoCivil,
			'documento_identificacion' => $documentoIdentificacion,
			'numero_documento' => $numeroDocumento,
			'lugar_extension' => $lugarExtension,
			'tipo_licencia' => $tipoLicencia,
			'numero_licencia' => $numeroLicencia,
			'nit' => $nit,
			'profesion' => $profesion,
			'numero_colegiado' => $numeroColegial,
			'telefono_casa' => $telefonoCasa,
			'telefono_movil' => $telefonoMovil,
			'correo' => $correo,
			'emergencia_contacto' => $emergenciaContacto,
			'parentesco' => $parentesco,
			'telefono_localizacion' => $telefonoLocalizacion,
			'direccion_residencia' => $direccionResidencia,
			'zona_kilometro' => $zonaKilometro,
			'colonia' => $colonia,
			'municipio' => $municipio,
			'departamento' => $departamento,
			'firma' => $firma,
			'fecha_hoy' => $fechaHoy
		];
		$applicant_id = $this->DpiModel->guardarAplicants($array, 'applicants');


		$family_data = [
			'applicant_id' => $applicant_id,
			'nombre_padre' => $this->input->post('nombre_padre'),
			'ocupacion_padre' => $this->input->post('ocupacion_padre'),
			'nombre_madre' => $this->input->post('nombre_madre'),
			'ocupacion_madre' => $this->input->post('ocupacion_madre'),
			'nombre_conyuge' => $this->input->post('nombre_conyuge'),
			'ocupacion_conyuge' => $this->input->post('ocupacion_conyuge'),
			'numero_hijos' => $this->input->post('numero_hijos'),
			'edades_sexos_hijos' => $this->input->post('edades_sexos_hijos'),
			'actividades_recreativas' => $this->input->post('actividades_recreativas'),
			'relacion_familiar' => $this->input->post('relacion_familiar')
		];
		$this->DpiModel->guardarDataSolicitud($family_data, 'family_data');


		// Capturar datos de 'current_studies'
		$current_studies = [
			'applicant_id' => $applicant_id,
			'estudia_actualmente' => $this->input->post('estudia_actualmente'),
			'dias_estudio' => $this->input->post('dias_estudio'),
			'horarios_estudio' => $this->input->post('horarios_estudio'),
			'carrera_actual' => $this->input->post('carrera_actual')
		];

		// Guardar datos en la tabla 'current_studies'
		$this->DpiModel->guardarDataSolicitud($current_studies, 'current_studies');


		// Capturar datos del formulario
		$economic_contributions = [
			'applicant_id' => $applicant_id,
			'aporte_alimentacion' => $this->input->post('aporte_alimentacion'),
			'aporte_servicios' => $this->input->post('aporte_servicios'),
			'aporte_educacion' => $this->input->post('aporte_educacion'),
			'aporte_medicamentos' => $this->input->post('aporte_medicamentos'),
			'otros_aportes' => $this->input->post('otros_aportes')
		];

		// Insertar en la tabla 'economic_contributions'
		$this->DpiModel->guardarDataSolicitud($economic_contributions, 'economic_contributions');

// Lista de niveles educativos con sufijos seguros
		$niveles = [
			'Primario' => 'primario',
			'Básico' => 'básico',
			'Diversificado' => 'diversificado',
			'Uni' => 'uni',
			'Post Grado' => 'postgrado'
		];

// Iteramos sobre los niveles esperados
		foreach ($niveles as $nivel => $suffix) {
			$periodo = $this->input->post("periodo_$suffix");
			$establecimiento = $this->input->post("establecimiento_$suffix");
			$situacion = $this->input->post("situacion_$suffix");
			$titulo = $this->input->post("titulo_$suffix");

			// Solo agregamos si el periodo y establecimiento tienen datos
			if (!empty($periodo) && !empty($establecimiento)) {
				$educational_history[] = [
					'applicant_id' => $applicant_id,
					'nivel' => $nivel, // Utilizamos el nombre original del nivel
					'periodo' => $periodo,
					'establecimiento' => $establecimiento,
					'situacion' => $situacion ?? null, // Valores opcionales
					'titulo' => $titulo ?? null
				];
			}
		}

// Guardamos cada nivel educativo en la base de datos
		foreach ($educational_history as $level) {
			$this->DpiModel->guardarDataSolicitud($level, 'educational_history');
		}


		// Crear el array con los datos de preferencias laborales
		$employment_preferences = [
			'applicant_id' => $applicant_id,
			'puesto_deseado' => $this->input->post('puesto_deseado'),
			'otros_puestos_interes' => $this->input->post('otros_puestos_interes'),
			'tipo_empresa' => $this->input->post('tipo_empresa'),
			'areas_deseadas' => $this->input->post('areas_deseadas'),
			'pretension_salarial' => $this->input->post('pretension_salarial'),
			'sueldo_negociable' => $this->input->post('sueldo_negociable'),
			'horarios_deseados' => $this->input->post('horarios_deseados'),
			'disponibilidad_trabajo' => $this->input->post('disponibilidad_trabajo'),
			'disponibilidad_viajar' => $this->input->post('disponibilidad_viajar'),
			'disposicion_interior' => $this->input->post('disposicion_interior'),
			'motivo_posicion' => $this->input->post('motivo_posicion'),
			'tiene_experiencia' => $this->input->post('tiene_experiencia'),
			'tiempo_experiencia' => $this->input->post('tiempo_experiencia')
		];

		// Insertar los datos en la base de datos
		$this->DpiModel->guardarDataSolicitud($employment_preferences, 'employment_preferences');


		// Array con los datos familiares
		$family_data = [
			'applicant_id' => $applicant_id,
			'nombre_padre' => $this->input->post('nombre_padre'),
			'ocupacion_padre' => $this->input->post('ocupacion_padre'),
			'nombre_madre' => $this->input->post('nombre_madre'),
			'ocupacion_madre' => $this->input->post('ocupacion_madre'),
			'nombre_conyuge' => $this->input->post('nombre_conyuge'),
			'ocupacion_conyuge' => $this->input->post('ocupacion_conyuge'),
			'numero_hijos' => $this->input->post('numero_hijos'),
			'edades_sexos_hijos' => $this->input->post('edades_sexos_hijos'),
			'actividades_recreativas' => $this->input->post('actividades_recreativas'),
			'relacion_familiar' => $this->input->post('relacion_familiar') // Valores como 'Excelente', 'Buena', etc.
		];

		// Guardar en la base de datos
		$this->DpiModel->guardarDataSolicitud($family_data, 'family_data');


		// Array con los datos de salud
		$health_data = [
			'applicant_id' => $applicant_id,
			'tipo_sangre' => $this->input->post('tipo_sangre'),
			'estatura' => $this->input->post('estatura'),
			'peso' => $this->input->post('peso'),
			'condicion_salud' => $this->input->post('condicion_salud'),
			'enfermedades' => $this->input->post('enfermedades'),
			'alergias' => $this->input->post('alergias'),
			'accidentes' => $this->input->post('accidentes'),
			'operaciones' => $this->input->post('operaciones'),
			'usa_anteojos' => $this->input->post('usa_anteojos'),
			'toma_medicamentos' => $this->input->post('toma_medicamentos')
		];

		// Guardar en la base de datos
		$this->DpiModel->guardarDataSolicitud($health_data, 'health_data');

		// Inicializamos un array para guardar los idiomas
		$languages_data = [];

		// Iteramos sobre los idiomas enviados (por ejemplo, hasta 5 idiomas)
		for ($i = 1; $i <= 3; $i++) {
			$idioma = $this->input->post("idioma_$i");
			$escritura = $this->input->post("escritura_$i");
			$lectura = $this->input->post("lectura_$i");
			$conversacion = $this->input->post("conversacion_$i");
			$establecimiento = $this->input->post("establecimiento_$i");

			// Verificamos si el idioma tiene datos (al menos el nombre del idioma)
			if (!empty($idioma)) {
				$languages_data[] = [
					'applicant_id' => $applicant_id,
					'idioma' => $idioma,
					'escritura' => $escritura ?? 0, // Si está vacío, asigna 0
					'lectura' => $lectura ?? 0, // Si está vacío, asigna 0
					'conversacion' => $conversacion ?? 0, // Si está vacío, asigna 0
					'establecimiento' => $establecimiento ?? null // Si está vacío, asigna null
				];
			}

		}

		// Guardamos cada idioma en la tabla
		foreach ($languages_data as $language) {
			$this->DpiModel->guardarDataSolicitud($language, 'languages');
		}

		// Recibimos las listas de datos desde el formulario
		$nombres = $this->input->post('nombre_referencia');
		$tipos = $this->input->post('tipo_referencia');
		$lugares_trabajo = $this->input->post('lugar_trabajo_referencia');
		$tiempos_conocer = $this->input->post('tiempo_conocer');
		$telefonos = $this->input->post('telefono_referencia');

		// Verificamos que todos los arrays tengan datos
		if (!empty($nombres) && is_array($nombres)) {
			foreach ($nombres as $index => $nombre) {
				// Solo procesamos las filas completas
				if (!empty($nombre) && !empty($tipos[$index]) && !empty($lugares_trabajo[$index]) &&
					!empty($tiempos_conocer[$index]) && !empty($telefonos[$index])) {
					$reference_data = [
						'applicant_id' => $applicant_id,
						'nombre_referencia' => $nombre,
						'tipo_referencia' => $tipos[$index],
						'lugar_trabajo' => $lugares_trabajo[$index],
						'tiempo_conocer' => $tiempos_conocer[$index],
						'telefono' => $telefonos[$index]
					];

					// Insertamos cada referencia en la base de datos
					$this->DpiModel->guardarDataSolicitud($reference_data, 'references');
				}
			}

		}

		// Capturamos el texto completo del textarea
		$capacitaciones_texto = $this->input->post('capacitaciones');

		// Creamos el array con los datos a guardar
		$training_data = [
			'applicant_id' => $applicant_id,
			'descripcion' => $capacitaciones_texto
		];

		// Insertamos en la base de datos
		$this->DpiModel->guardarDataSolicitud($training_data, 'capacitaciones');


		// Capturamos los datos del formulario
		$programas_computacion = $this->input->post('programas_computacion');
		$equipos_operar = $this->input->post('equipos_operar');

		// Creamos el array con los datos
		$skills_data = [
			'applicant_id' => $applicant_id,
			'programas_computacion' => $programas_computacion,
			'equipos_operar' => $equipos_operar
		];

		// Insertamos los datos en la base de datos
		$this->DpiModel->guardarDataSolicitud($skills_data, 'skills');


		// Capturamos los datos del formulario
		$tipo_vivienda = $this->input->post('tipo_vivienda');
		$renta_mensual = $this->input->post('renta_mensual');
		$tipo_vehiculo = $this->input->post('tipo_vehiculo');
		$tipo_deudas = $this->input->post('tipo_deudas');
		$deuda_total = $this->input->post('deuda_total');
		$ingresos_extraordinarios = $this->input->post('ingresos_extraordinarios');
		$monto_otros_ingresos = $this->input->post('monto_otros_ingresos');
		$religion = $this->input->post('religion');
		$asociaciones = $this->input->post('asociaciones');
		$deportes = $this->input->post('deportes');
		$tiempo_libre = $this->input->post('tiempo_libre');
		$cualidades = $this->input->post('cualidades');

		// Crear el array con los datos
		$social_economic_data = [
			'applicant_id' => $applicant_id,
			'tipo_vivienda' => $tipo_vivienda,
			'renta_mensual' => $renta_mensual,
			'tipo_vehiculo' => $tipo_vehiculo,
			'tipo_deudas' => $tipo_deudas,
			'deuda_total' => $deuda_total,
			'ingresos_extraordinarios' => $ingresos_extraordinarios,
			'monto_otros_ingresos' => $monto_otros_ingresos,
			'religion' => $religion,
			'asociaciones' => $asociaciones,
			'deportes' => $deportes,
			'tiempo_libre' => $tiempo_libre,
			'cualidades' => $cualidades
		];

		// Insertar los datos en la base de datos
		$this->DpiModel->guardarDataSolicitud($social_economic_data, 'social_economic_data');

		// Capturamos los datos en arrays
		$nombre_empresa = $this->input->post('nombre_empresa');
		$direccion_empresa = $this->input->post('direccion_empresa');
		$telefono_empresa = $this->input->post('telefono_empresa');
		$email_empresa = $this->input->post('email_empresa');
		$actividad_comercial = $this->input->post('actividad_comercial');
		$puesto_inicial = $this->input->post('puesto_inicial');
		$puesto_final = $this->input->post('puesto_final');
		$fecha_inicio = $this->input->post('fecha_inicio');
		$fecha_retiro = $this->input->post('fecha_retiro');
		$salario_inicial = $this->input->post('salario_inicial');
		$salario_final = $this->input->post('salario_final');
		$motivo_retiro = $this->input->post('motivo_retiro');
		$atribuciones = $this->input->post('atribuciones');
		$referencias = $this->input->post('referencias');
		$porque_referencias = $this->input->post('porque_referencias');
		$jefe_inmediato = $this->input->post('jefe_inmediato');
		$valores_empresa = $this->input->post('valores_empresa');
		$disgusto_empresa = $this->input->post('disgusto_empresa');

		// Iteramos sobre los datos para construir múltiples registros
		for ($i = 0; $i < count($nombre_empresa); $i++) {
			if (!empty($nombre_empresa[$i])) { // Verificamos que el nombre de la empresa no esté vacío
				$job_experience_data = [
					'applicant_id' => $applicant_id,
					'nombre_empresa' => $nombre_empresa[$i],
					'direccion_empresa' => $direccion_empresa[$i],
					'telefono_empresa' => $telefono_empresa[$i],
					'email_empresa' => $email_empresa[$i],
					'actividad_comercial' => $actividad_comercial[$i],
					'puesto_inicial' => $puesto_inicial[$i],
					'puesto_final' => $puesto_final[$i],
					'fecha_inicio' => $fecha_inicio[$i],
					'fecha_retiro' => $fecha_retiro[$i],
					'salario_inicial' => $salario_inicial[$i],
					'salario_final' => $salario_final[$i],
					'motivo_retiro' => $motivo_retiro[$i],
					'atribuciones' => $atribuciones[$i],
					'referencias' => $referencias[$i],
					'porque_referencias' => $porque_referencias[$i],
					'jefe_inmediato' => $jefe_inmediato[$i],
					'valores_empresa' => $valores_empresa[$i],
					'disgusto_empresa' => $disgusto_empresa[$i],
				];

				// Insertamos cada registro
				$this->DpiModel->guardarDataSolicitud($job_experience_data, 'work_experience');

				redirect('PruebasController/actualizarPruebas');



			}
		}


	}


    public function pruebaValanti($DPI)
    {
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; //obtengo el id del candidato segun su dpi que recibo antes


        if ($data['Candidato']->Valanti === '1') {
            $this->load->view('Pruebas/Valanti', $data);
        } else {
            $this->load->view('Pruebas/Login', $data);
        }
    }



    public function pruebaBriggs($DPI)
    {
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; //obtengo el id del candidato segun su dpi que recibo antes


        if ($data['Candidato']->Briggs === '1') {
            $this->load->view('Pruebas/Briggs', $data);
        } else {
            $this->load->view('Pruebas/Login', $data);
        }
    }

    public function prueba16pf($DPI)
    {
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; //obtengo el id del candidato segun su dpi que recibo antes


        if ($data['Candidato']->fp16 === '1') {
            $this->load->view('Pruebas/Fp16', $data);
        } else {
            $this->load->view('Pruebas/Login', $data);
        }
    }

    
    public function procesarPF(){
        $DPI = $this->input->post('DPI'); // Obtén el DPI desde el formulario
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; // Obtén el id del candidato

       // Definir los números de las carillas que quieres sumar
        $arrayReservado = array(2,19,36,53,70,87); //AMARILLO
        $arrayLento = array(3,20,37,54,71,88); //VERDE CLARO
        $arrayInfantil = array(4,21,38,55,72,89); //CELESTE
        $arraySumiso = array(5,22,39,56,73,90); //OXIDO
        $arrayTaciturno = array(6,23,40,57,74,91);//PIEL
        $arrayVariable = array(7,24,41,58,75,92);//MORADO
        $arrayTimido = array(8,25,42,59,76,93);//GRIS
        $arrayEmocional = array(9,26,43,60,77,94); //CAFEM**
        $arraySospechoso = array(10,27,44,61,78,95); //CAFER**
        $arrayExcentrico = array(11,28,45,62,79,96); //NARANJAOX
        $arraySimple = array(12,29,46,63,80,97); //MORADOOSC
        $arrayInseguro = array(13,30,47,64,81,98); //MUSGO**
        $arrayRutinario = array(14,31,48,65,82,99); //AZUL**
        $arrayDependiente = array(15,32,49,66,83,100); //MILITAR**
        $arrayDescontrolado = array(16,33,50,67,84,101);//CELESTECL
        $arrayTenso = array(17,34,51,68,85,102); //BLANCO

        // Inicializar la suma
        $sumaReservado = 0;
        $sumaLento = 0;
        $sumaInfantil = 0;
        $sumaSumiso = 0;
        $sumaTaciturno = 0;
        $sumaVariable = 0;
        $sumaTimido = 0;
        $sumaEmocional = 0;
        $sumaSospechoso = 0;
        $sumaExcentrico = 0;
        $sumaSimple = 0;
        $sumaInseguro = 0;
        $sumaRutinario = 0;
        $sumaDependiente = 0;
        $sumaDescontrolado = 0;
        $sumaTenso = 0;

        // Iterar sobre los números de carillas y sumar sus valores
        foreach ($arrayReservado as $numero) {
            $sumaReservado += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaReservado += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaReservado += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de las carillas y sumar sus valores para otras categorías
        foreach ($arrayLento as $numero) {
            $sumaLento += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaLento += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaLento += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        foreach ($arrayInfantil as $numero) {
            $sumaInfantil += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaInfantil += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaInfantil += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        foreach ($arraySumiso as $numero) {
            $sumaSumiso += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaSumiso += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaSumiso += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        foreach ($arrayTaciturno as $numero) {
            $sumaTaciturno += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaTaciturno += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaTaciturno += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

                // Iterar sobre los números de carillas y sumar sus valores para la categoría "Variable"
        foreach ($arrayVariable as $numero) {
            $sumaVariable += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaVariable += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaVariable += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Tímido"
        foreach ($arrayTimido as $numero) {
            $sumaTimido += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaTimido += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaTimido += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Emocional"
        foreach ($arrayEmocional as $numero) {
            $sumaEmocional += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaEmocional += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaEmocional += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Sospechoso"
        foreach ($arraySospechoso as $numero) {
            $sumaSospechoso += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaSospechoso += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaSospechoso += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }
            

        
            // Iterar sobre los números de carillas y sumar sus valores para la categoría "Excentrico"
        foreach ($arrayExcentrico as $numero) {
            $sumaExcentrico += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaExcentrico += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaExcentrico += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Simple"
        foreach ($arraySimple as $numero) {
            $sumaSimple += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaSimple += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaSimple += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Inseguro"
        foreach ($arrayInseguro as $numero) {
            $sumaInseguro += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaInseguro += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaInseguro += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Rutinario"
        foreach ($arrayRutinario as $numero) {
            $sumaRutinario += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaRutinario += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaRutinario += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Dependiente"
        foreach ($arrayDependiente as $numero) {
            $sumaDependiente += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaDependiente += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaDependiente += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Descontrolado"
        foreach ($arrayDescontrolado as $numero) {
            $sumaDescontrolado += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaDescontrolado += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaDescontrolado += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Iterar sobre los números de carillas y sumar sus valores para la categoría "Tenso"
        foreach ($arrayTenso as $numero) {
            $sumaTenso += intval($this->input->post($numero . 'a')); // Sumar el valor de la opción A
            $sumaTenso += intval($this->input->post($numero . 'b')); // Sumar el valor de la opción B
            $sumaTenso += intval($this->input->post($numero . 'c')); // Sumar el valor de la opción C
        }

        // Crear un array asociativo para almacenar las sumas de cada categoría
        $sumasCategorias = array(
            'p1' => $sumaReservado,
            'p2' => $sumaLento,
            'p3' => $sumaInfantil,
            'p4' => $sumaSumiso,
            'p5' => $sumaTaciturno,
            'p6' => $sumaVariable,
            'p7' => $sumaTimido,
            'p8' => $sumaEmocional,
            'p9' => $sumaSospechoso,
            'p10' => $sumaExcentrico,
            'p11' => $sumaSimple,
            'p12' => $sumaInseguro,
            'p13' => $sumaRutinario,
            'p14' => $sumaDependiente,
            'p15' => $sumaDescontrolado,
            'p16' => $sumaTenso
        );

        $this->DpiModel->AgregarPf($idCandidato, $sumasCategorias);

        $this->CandidatoModel->desactivarPf($idCandidato); //Desactivo la prueba
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);  //Actualizo la data, por que la data anterior no tiene la preuba desactivada, esto me da conflicto
        $this->load->view('Pruebas/Login', $data); //cargo la vista con la nueva data


    }
    public function procesarValanti()
    {

        $DPI = $this->input->post('DPI'); // Obtén el DPI desde el formulario
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; // Obtén el id del candidato



        $primeraA = $this->input->post('primera_1');
        $primeraB = $this->input->post('segunda_1');

        $segundaA = $this->input->post('primera_2');
        $segundaB = $this->input->post('segunda_2');

        $terceraA = $this->input->post('primera_3');
        $terceraB = $this->input->post('segunda_3');

        $cuartaA = $this->input->post('primera_4');
        $cuartaB = $this->input->post('segunda_4');

        $quintaA = $this->input->post('primera_5');
        $quintaB = $this->input->post('segunda_5');

        $sextaA = $this->input->post('primera_6');
        $sextaB = $this->input->post('segunda_6');

        $septimaA = $this->input->post('primera_7');
        $septimaB = $this->input->post('segunda_7');

        $octavaA = $this->input->post('primera_8');
        $octavaB = $this->input->post('segunda_8');

        $novenaA = $this->input->post('primera_9');
        $novenaB = $this->input->post('segunda_9');

        $decimoA = $this->input->post('primera_10');
        $decimoB = $this->input->post('segunda_10');

        $onceA = $this->input->post('primera_11');
        $onceB = $this->input->post('segunda_11');

        $doceA = $this->input->post('primera_12');
        $doceB = $this->input->post('segunda_12');

        $treceA = $this->input->post('primera_13');
        $treceB = $this->input->post('segunda_13');

        $catorceA = $this->input->post('primera_14');
        $catorceB = $this->input->post('segunda_14');

        $quinceA = $this->input->post('primera_15');
        $quinceB = $this->input->post('segunda_15');

        $dieciseisA = $this->input->post('primera_16');
        $dieciseisB = $this->input->post('segunda_16');

        $diecisieteA = $this->input->post('primera_17');
        $diecisieteB = $this->input->post('segunda_17');

        $dieciochoA = $this->input->post('primera_18');
        $dieciochoB = $this->input->post('segunda_18');

        $diecinueveA = $this->input->post('primera_19');
        $diecinueveB = $this->input->post('segunda_19');

        $veinteA = $this->input->post('primera_20');
        $veinteB = $this->input->post('segunda_20');

        $veintiunoA = $this->input->post('primera_21');
        $veintiunoB = $this->input->post('segunda_21');

        $veintidosA = $this->input->post('primera_22');
        $veintidosB = $this->input->post('segunda_22');

        $veintitresA = $this->input->post('primera_23');
        $veintitresB = $this->input->post('segunda_23');

        $veinticuatroA = $this->input->post('primera_24');
        $veinticuatroB = $this->input->post('segunda_24');

        $veinticincoA = $this->input->post('primera_25');
        $veinticincoB = $this->input->post('segunda_25');

        $veintiseisA = $this->input->post('primera_26');
        $veintiseisB = $this->input->post('segunda_26');

        $veintisieteA = $this->input->post('primera_27');
        $veintisieteB = $this->input->post('segunda_27');

        $veintiochoA = $this->input->post('primera_28');
        $veintiochoB = $this->input->post('segunda_28');

        $veintinueveA = $this->input->post('primera_29');
        $veintinueveB = $this->input->post('segunda_29');

        $treintaA = $this->input->post('primera_30');
        $treintaB = $this->input->post('segunda_30');


        $verdad = $terceraA+$quintaA+$sextaA+$septimaB+$octavaB+$novenaB+$doceA+$dieciseisA+$dieciochoB+$veinteA+$veintitresB+$veinticincoB;

        $rectitud = $primeraB+$segundaB+$quintaB+$sextaB+$septimaA+$onceA+$treceB+$veintiunoA+$veinticuatroB+$veintiseisA+$veintiochoA+$veintinueveA;
        
        $paz = $terceraB+$cuartaA+$decimoB+$doceB+$catorceA+$quinceB+$diecisieteB+$diecinueveA+$veintiunoB+$veinticuatroA+$veinticincoA+$veintiseisB+$veintiochoB;
        
        $amor = $primeraA+$segundaA+$octavaA+$quinceA+$dieciseisB+$diecisieteA+$diecinueveB+$veintidosB+$veintisieteB+$treintaB;

        $noViolencia = $cuartaB+$novenaA+$decimoA+$onceB+$treceA+$catorceB+$dieciochoA+$veinteB+$veintidosA+$veintitresA+$veintisieteA+$veintinueveB+$treintaA;



        //VERDAD
        $min = 15.6479452054795; // Este valor vendría de tu celda J2 en Excel
        $desviacion = 4.7033423480048;
        $verdadNormalizada = ceil($this->normalizar($verdad, $min, $desviacion) * 10 + 50);

        //RECTITUD
        $min = 21.0506849315069; // Este valor vendría de tu celda J2 en Excel
        $desviacion = 4.44492661852588;
        $rectitudNormalizada = ceil($this->normalizar($rectitud, $min, $desviacion) * 10 + 50);

         //PAZ
         $min = 17.3534246575342; // Este valor vendría de tu celda J2 en Excel
         $desviacion = 6.60888710785178;
         $pazNormalizada = ceil($this->normalizar($paz, $min, $desviacion) * 10 + 50);
 

         //AMOR
         $min = 16.6821917808219; // Este valor vendría de tu celda J2 en Excel
         $desviacion = 5.41200571776265;
         $amorNormalizado = ceil($this->normalizar($amor, $min, $desviacion) * 10 + 50);
 

         //NO VIOLENCIA
         $min = 21.2246575342466; // Este valor vendría de tu celda J2 en Excel
         $desviacion = 7.19426270463846;
         $noViolenciaNormalizado = ceil($this->normalizar($noViolencia, $min, $desviacion) * 10 + 50);
 
        $this->DpiModel->AgregarResultadosValanti($idCandidato,$verdadNormalizada,$rectitudNormalizada,$pazNormalizada,$amorNormalizado,$noViolenciaNormalizado);

        $data['verdad'] = $verdad;
        $data['rectitud'] = $rectitud;
        $data['paz'] = $paz;
        $data['amor'] = $amor;
        $data['noViolencia'] = $noViolencia;

        $this->CandidatoModel->desactivarValanti($idCandidato); //Desactivo la prueba
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);  //Actualizo la data, por que la data anterior no tiene la preuba desactivada, esto me da conflicto
        $this->load->view('Pruebas/Login', $data); //cargo la vista con la nueva data


        
    }
    function normalizar($valor, $min, $desviacion) {
        // Valores de Excel para la normalización
        
        // Fórmula de normalización
        return (($valor - $min) / $desviacion);
    }
    

    
  
    function noViolencia($noViolencia) {

        return (($noViolencia - 21.2246575342466) / (7.19426270463846 - 21.2246575342466)) * 10 + 50;
    }


	public function procesarRespuestas()
	{

		$DPI = $this->input->post('DPI'); // Obtén el DPI desde el formulario
		$data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
		$idCandidato = $data['Candidato']->idCandidato; // Obtén el id del candidato

		// Verifica las respuestas del formulario y actualiza la tabla según corresponda
		if ($this->input->post('respuesta1') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
		}
		if ($this->input->post('respuesta2') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
		}
		if ($this->input->post('respuesta3') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
		}
		if ($this->input->post('respuesta4') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
		}
		if ($this->input->post('respuesta5') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'extrovertido');
		}
		if ($this->input->post('respuesta6') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
		}
		if ($this->input->post('respuesta7') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
		}
		if ($this->input->post('respuesta8') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
		}
		if ($this->input->post('respuesta9') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
		}
		if ($this->input->post('respuesta10') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'introvertido');
		}
		if ($this->input->post('respuesta11') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
		}
		if ($this->input->post('respuesta12') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
		}
		if ($this->input->post('respuesta13') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
		}
		if ($this->input->post('respuesta14') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
		}
		if ($this->input->post('respuesta15') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'sensorial');
		}
		if ($this->input->post('respuesta16') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
		}
		if ($this->input->post('respuesta17') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
		}
		if ($this->input->post('respuesta18') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
		}
		if ($this->input->post('respuesta19') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
		}
		if ($this->input->post('respuesta20') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'intuitivo');
		}

		if ($this->input->post('respuesta21') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'racional');
		}
		if ($this->input->post('respuesta22') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'racional');
		}
		if ($this->input->post('respuesta23') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'racional');
		}
		if ($this->input->post('respuesta24') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'racional');
		}
		if ($this->input->post('respuesta25') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'racional');
		}
		if ($this->input->post('respuesta26') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
		}
		if ($this->input->post('respuesta27') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
		}
		if ($this->input->post('respuesta28') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
		}
		if ($this->input->post('respuesta29') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
		}
		if ($this->input->post('respuesta30') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'emocional');
		}
		if ($this->input->post('respuesta31') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
		}
		if ($this->input->post('respuesta32') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
		}
		if ($this->input->post('respuesta33') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
		}
		if ($this->input->post('respuesta34') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
		}
		if ($this->input->post('respuesta35') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'calificador');
		}
		if ($this->input->post('respuesta36') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
		}
		if ($this->input->post('respuesta37') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
		}
		if ($this->input->post('respuesta38') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
		}
		if ($this->input->post('respuesta39') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
		}
		if ($this->input->post('respuesta40') == 'x') {
			$this->DpiModel->actualizarBriggs($idCandidato, 'perceptivo');
		}



		$this->CandidatoModel->desactivarbriggs($idCandidato);

		//esta es la nueva data con el briggs desactivado
		$data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato

		$this->load->view('Pruebas/Login', $data);

	}



    public function RealizarPruebas($DPI)
    {


        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato; //obtengo el id del candidato segun su dpi que recibo antes
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $data['Formulario'] = $this->DpiModel->dataTemperamentos($indice);

        $temperamentoActivo = $data['Candidato']->temperamento;


        if ($temperamentoActivo && $indice < 41) {

            $this->load->view('Pruebas/Temperamento', $data); // Cargar la vista de la prueba de temperamentos
            $this->DpiModel->actualizarTemporal($DPI, $indice);


        } else {
            $this->CandidatoModel->desactivarTemperamento($idCandidato);
            $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato


            $this->load->view('Pruebas/Login', $data);
        }
    }

    public function sanguineo($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;

        $personalidad = $aspectopersonalidad->P4;


        $tipo = "D";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }






        $puntosactual = $data['Candidato']->sanguineo; //pbtener el dato actual

        $this->DpiModel->actualizarSanguineo($idCandidato, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }

    public function melancolico($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;


        $personalidad = $aspectopersonalidad->P1;

        $tipo = "A";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }


        $puntosactual = $data['Candidato']->melancolico; //pbtener el dato actual

        $this->DpiModel->actualizarMelancolico($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }
    public function flematico($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;


        $personalidad = $aspectopersonalidad->P3;

        $tipo = "C";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }
        $puntosactual = $data['Candidato']->flematico; //pbtener el dato actual

        $this->DpiModel->actualizarFlematico($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }

    public function colerico($DPI)
    {

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $indice = $data['Candidato']->Temporal; //Obtengo el indice para las preguntas, esto me ayuda para verificar en que pregunta se quedo el candidato

        $aspectopersonalidad = $this->DpiModel->dataTemperamentos($indice - 1);

        $idCandidato = $data['Candidato']->idCandidato;


        $personalidad = $aspectopersonalidad->P2;

        $tipo = "B";

        if ($indice <= 21) {
            $this->DpiModel->IngresarFortaleza($personalidad, $idCandidato, $tipo);

        } elseif ($indice > 21) {
            $this->DpiModel->IngresarDebilidad($personalidad, $idCandidato, $tipo);


        }
        $puntosactual = $data['Candidato']->colerico; //pbtener el dato actual

        $this->DpiModel->actualizarColerico($DPI, $puntosactual); // Le sumo un punto a sanguineo

        $this->RealizarPruebas($DPI);


    }


    //PROCESAR LA PRUEBA CLEAVER

    public function cleaver($DPI, $indice)
    {
            $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
            $idCandidato = $data['Candidato']->idCandidato; // Obtener el id del candidato según su DPI que recibo antes
            $data['Cleaverdata'] = $this->DpiModel->preguntasCleaver($indice); // Llamar al método correctamente
            $data['indice']=$indice;

            if ($data['Candidato']->cleaver === '1') {
                $this->load->view('Pruebas/cleaver', $data);
            } else {
                $this->load->view('Pruebas/Login', $data);
    }
    }

    public function procesarCleaver()
    {
        $indice = $this->input->post('indice');
        $DPI = $this->input->post('DPI'); // Capturar el DPI desde el formulario
        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato; // Obtener el id del candidato según su DPI que recibo antes
        


        $M = $this->input->post('mas'); // A QUE CASILLA DE la tabla cleaver se carga un +1
        $L = $this->input->post('menos'); // a qwue casilla de la tabla cleaver se carga el +1

        $id = $this->input->post('idcleaverdata'); // Necesitas pasar este valor desde el formulario

        // Actualizar la tabla cleaver
        $this->DpiModel->actualizarCleaver($idCandidato, $M, $L);



        if($indice==24){
            $this->CandidatoModel->desactivarcleaver($idCandidato);
            $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);  //Actualizo la data, por que la data anterior no tiene la preuba desactivada, esto me da conflicto
            $this->DpiModel->Cleaver($idCandidato);

            $valores =  $this->DpiModel->obtenerValoresCleaver($idCandidato);

            $data_grafica = array(
                'idCandidato' => $idCandidato,
                'M1' => $this->DpiModel->ObtenerCampo('idM1', $valores->M1, 'M1'),
                'M2' => $this->DpiModel->ObtenerCampo('idM2', $valores->M2, 'M2'),
                'M3' => $this->DpiModel->ObtenerCampo('idM3', $valores->M3, 'M3'),
                'M4' => $this->DpiModel->ObtenerCampo('idM4', $valores->M4, 'M4'),
                'L1' => $this->DpiModel->ObtenerCampo('idL1', $valores->L1, 'L1'),
                'L2' => $this->DpiModel->ObtenerCampo('idL2', $valores->L2, 'L2'),
                'L3' => $this->DpiModel->ObtenerCampo('idL3', $valores->L3, 'L3'),
                'L4' => $this->DpiModel->ObtenerCampo('idL4', $valores->L4, 'L4'),
                'T1' => $this->DpiModel->ObtenerCampo('idT1', $valores->T1, 'T1'),
                'T2' => $this->DpiModel->ObtenerCampo('idT2', $valores->T2, 'T2'),
                'T3' => $this->DpiModel->ObtenerCampo('idT3', $valores->T3, 'T3'),
                'T4' => $this->DpiModel->ObtenerCampo('idT4', $valores->T4, 'T4')
            );

            
                
            // Insertar los nuevos valores en la tabla `graficaCleaver`
            $this->DpiModel->insertGraficaCleaver($data_grafica);

            $this->load->view('Pruebas/Login', $data); //cargo la vista con la nueva data
    


        }else{
            $this->cleaver($DPI,$indice+1);

        }


    }





}

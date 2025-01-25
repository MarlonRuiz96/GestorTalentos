<?php

defined('BASEPATH') or exit('No direct script access allowed');
class CandidatoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CandidatoModel');
        $this->load->helper('autenticacion');
        require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
        $this->dompdf = new \Dompdf\Dompdf();
    }


    public function indexConsulta()
    {
        verificar_autenticacion($this);
        $data['prueba_data'] = $this->CandidatoModel->getCandidato();
        $this->load->view('Candidato/ConsultaCandidato', $data);
    }

    public function indexAlta()
    {
        verificar_autenticacion($this);
        $this->load->view('Candidato/IngresarCandidato');
    }
    public function CrearCandidato()
    {
        verificar_autenticacion($this);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
			//obtengo los datos con posts
            $DPI = $this->input->post('DPI');

            $fecha_actual = date("Y-m-d");

			$data = array(
                'Nombres' => $nombres,
                'Puesto' => $Puesto,
                'DPI' => $DPI,
                'temperamento' => $Temperamento,
                'Contacto' => $Contacto,
                'Correo' => $correo,
                'fecha_crear' => $fecha_actual,
                'Temporal' => 1,
            );

            $this->CandidatoModel->InsertarCandidato($data);

            redirect('Candidatos');
        }

    }

    public function GuardarCambios($idCandidato)
    {

        $referer = $_SERVER['HTTP_REFERER'];

        $nuevoNombre = $this->input->post('editNombre');
        $nuevaPuesto = $this->input->post('editPuesto');
        $nuevoConctacto = $this->input->post('editContacto');
        $nuevoCorreo = $this->input->post('editCorreo');

        $this->CandidatoModel->ActualizarCandidato($idCandidato, $nuevoNombre, $nuevaPuesto, $nuevoConctacto, $nuevoCorreo);
        return redirect('Candidatos');


    }
    public function VerCandidato($idCandidato)
    {
        $data['candidato_data']         = $this->CandidatoModel->getCandidatoPorId($idCandidato);
        $data['dataTemperamento']       = $this->CandidatoModel->getDatosPrueba($idCandidato);
        $data['dataBriggs']            = $this->CandidatoModel->getDatosBriggs($idCandidato);
        $data['dataValanti']           = $this->CandidatoModel->getDatosValanti($idCandidato);
        $data['data16pf']              = $this->CandidatoModel->getDatos16pf($idCandidato);
        $data['dataCleaver']           = $this->CandidatoModel->getDatoscleaver($idCandidato);
        $data['comentario']            = $this->CandidatoModel->getComentario($idCandidato);
        $data['interpretacionCleaver'] = $this->CandidatoModel->obtenerInterpretacionCleaver($idCandidato);
        $data['eventos']= $this->CandidatoModel->getEventoPorId($idCandidato);
    
        // Log para verificar el progreso actual
        log_message('debug', '[VerCandidato] ID Candidato=' . $idCandidato . 
            ', Progreso actual=' . $data['candidato_data']->progreso);
    
        // Verificar si el candidato tiene pruebas activas
        if ($data['candidato_data']->progreso == 2) {
            log_message('debug', '[VerCandidato] El candidato está en progreso=2. Validando pruebas...');
            
            // Log de cada prueba para asegurarnos de que estén en 0
            log_message('debug', '[VerCandidato] fp16=' . $data['candidato_data']->fp16 .
                ', Briggs=' . $data['candidato_data']->Briggs .
                ', Valanti=' . $data['candidato_data']->Valanti .
                ', cleaver=' . $data['candidato_data']->cleaver .
                ', temperamento=' . $data['candidato_data']->temperamento
            );
    
            if (
                $data['candidato_data']->fp16         == 0 &&
                $data['candidato_data']->Briggs       == 0 &&
                $data['candidato_data']->Valanti      == 0 &&
                $data['candidato_data']->cleaver      == 0 &&
                $data['candidato_data']->temperamento == 0
            ) {
                log_message('debug', '[VerCandidato] Todas las pruebas están en 0. Se llamará a AvanzarFase.');
    
                $progresoActual = $data['candidato_data']->progreso;
                log_message('debug', '[VerCandidato] Llamando AvanzarFase con progreso=' . $progresoActual);
    
                $this->CandidatoModel->AvanzarFase($idCandidato, $progresoActual);
    
                // Recargar la info del candidato después de AvanzarFase
                $data['candidato_data'] = $this->CandidatoModel->getCandidatoPorId($idCandidato);
                log_message('debug', '[VerCandidato] Nuevo progreso tras AvanzarFase=' . $data['candidato_data']->progreso);
    
            } else {
                log_message('debug', '[VerCandidato] No se cumplen las condiciones (pruebas en 0). NO se llama AvanzarFase.');
            }
        } else {
            log_message('debug', '[VerCandidato] El progreso NO es 2, es=' . $data['candidato_data']->progreso . '. No se hace nada especial.');
        }

          // Validar si dataCleaver está vacío
    if (empty($data['dataCleaver'])) {
      // Manejar el caso donde dataCleaver está vacío
      $data['maxCleaver'] = array(
          'maxM' => array('celda' => '', 'valor' => '', 'interpretacionM' => 'No hay datos disponibles'),
          'maxL' => array('celda' => '', 'valor' => '', 'interpretacionL' => 'No hay datos disponibles'),
          'maxT' => array('celda' => '', 'valor' => '', 'interpretacionT' => 'No hay datos disponibles'),
          'minM' => array('celda' => '', 'valor' => ''),
          'minL' => array('celda' => '', 'valor' => ''),
          'minT' => array('celda' => '', 'valor' => '')
      );

    } else {
            // Encontrar los máximos para M, L y T
        $M_values = array('M1' => $data['dataCleaver']->M1, 'M2' => $data['dataCleaver']->M2, 'M3' => $data['dataCleaver']->M3, 'M4' => $data['dataCleaver']->M4);
        $L_values = array('L1' => $data['dataCleaver']->L1, 'L2' => $data['dataCleaver']->L2, 'L3' => $data['dataCleaver']->L3, 'L4' => $data['dataCleaver']->L4);
        $T_values = array('T1' => $data['dataCleaver']->T1, 'T2' => $data['dataCleaver']->T2, 'T3' => $data['dataCleaver']->T3, 'T4' => $data['dataCleaver']->T4);

        $maxM = array_keys($M_values, max($M_values))[0];
        $maxL = array_keys($L_values, max($L_values))[0];
        $maxT = array_keys($T_values, max($T_values))[0];

        $minM = array_keys($M_values, min($M_values))[0];
        $minL = array_keys($L_values, min($L_values))[0];
        $minT = array_keys($T_values, min($T_values))[0];

        // Interpretación de los valores máximos de M
        $interpretacionM = '';
        $interpretacionL = '';
        $interpretacionT = '';
         


         /*
        M1= D
        M2= I
        M3=S
        M4=  C
          */

          if ($maxM === 'M1' && $minM === 'M2') {
            $interpretacionM = "Tiende a ser lógico, crítico e incisivo en sus enfoques hacia la obtención de metas. Se sentirá retado por problemas que requieren esfuerzos de análisis y originalidad. Será llano y crítico con la gente.";
          } else if ($maxM === 'M1' && $minM === 'M3') {
            $interpretacionM = "Responde rápidamente a los retos, demuestra movilidad y flexibilidad en sus enfoques. Tiende a ser iniciador versátil respondiendo rápidamente a la competencia.";
          } else if ($maxM === 'M1' && $minM === 'M4') {
            $interpretacionM = "Actúa de una manera directa y positiva ante la oposición. Es una persona fuerte que toma posición y lucha por mantenerla. Está dispuesto a tomar riesgos y puede aún ignorar niveles jerárquicos.";
          } else if ($maxM === 'M2' && $minM === 'M1') {
            $interpretacionM = "Tiende a comportarse en una forma equilibrada y cordial, desplegando 'agresividad social' en situaciones que percibe como favorables y sin amenazas. Tiende a mostrarse simpático y a establecer relaciones armoniosas con la gente desde el primer contacto.";
          } else if ($maxM === 'M2' && $minM === 'M3') {
            $interpretacionM = "Tiende a buscar a la gente con entusiasmo y chispa. Es una persona abierta que despliega un optimismo contagioso y trata de ganarse a la gente a través de la persuasión de un acercamiento sociable.";
          } else if ($maxM === 'M2' && $minM === 'M4') {
            $interpretacionM = "Despliega confianza en sí mismo en la mayoría de sus tratos con otras personas. Aunque siempre lucha por ganarse a la gente, se muestra reacio a ceder su propio punto de vista. Esta persona tiende a no aguantar que una situación se presente, él será capaz de resolverla.";
          } else if ($maxM === 'M3' && $minM === 'M1') {
            $interpretacionM = "Tiende a ser constante y consistente prefiriendo tratar un proyecto o tarea a la vez. En general, esta persona dirigirá sus habilidades y experiencias hacia áreas que requieren profundidad y especialización. Ecuánime bajo las presiones, busca estabilidad.";
          } else if ($maxM === 'M3' && $minM === 'M2') {
            $interpretacionM = "Reflexión (Concentración): Tiende a ser un individuo controlado y paciente. Se mueve con moderación y premeditación en la mayoría de las situaciones con cuidado y concentración.";
          } else if ($maxM === 'M3' && $minM === 'M4') {
            $interpretacionM = "Persistencia: Tiende a ser un individuo persistente y perseverante que una vez que decide algo, no fácilmente se desvía de su objetivo. Tenderá a tomar un ritmo de trabajo y a apegarse a él. Puede ser rígido e independiente cuando se aplica la fuerza para hacerle cambiar.";
          } else if ($maxM === 'M4' && $minM === 'M1') {
            $interpretacionM = "Adaptabilidad: Tiende a actuar de una forma cuidadosa y conservadora en general. Está dispuesto a modificar o transigir en su posición con el objeto de lograr sus objetivos. Siendo un estricto observador de las políticas, puede aparecer arbitrario y poco flexible al seguir.";
          } else if ($maxM === 'M4' && $minM === 'M2') {
            $interpretacionM = "Perfeccionismo: Esta persona tiende a ser un seguidor exacto de las órdenes y los sistemas. Toma decisiones basadas en hechos conocidos o procedimientos establecidos. En todas sus actividades, trata meticulosamente de apegarse a los estándares establecidos, ya sea por sí mismo o por los demás.";
          } else if ($maxM === 'M4' && $minM === 'M3') {
            $interpretacionM = "Sensibilidad: Esta persona estará muy consciente en evitar riesgos o problemas. Tiende a buscar significados ocultos. La tensión puede ser evidente particularmente si está bajo presión por obtener resultados. En general, se sentirá intranquilo mientras que no tenga una seguridad completa.";
          } else {
            $interpretacionM = "No se pudo determinar una interpretación con los datos proporcionados.";
          }


          if ($maxL === 'L1' && $minL === 'L2') {
            $interpretacionL = "Motivación: Creatividad: Cuando está motivado, tiende a ser lógico, crítico e incisivo en sus enfoques hacia la obtención de metas. Se siente retado por problemas que requieren esfuerzos de análisis y originalidad. Será llano y crítico con la gente.";
          } else if ($maxL === 'L1' && $minL === 'L3') {
            $interpretacionL = "Motivación: Empuje: Cuando está motivado, responde rápidamente a los retos, demostrando movilidad y flexibilidad en sus enfoques. Tiende a ser iniciador versátil respondiendo rápidamente a la competencia.";
          } else if ($maxL === 'L1' && $minL === 'L4') {
            $interpretacionL = "Motivación: Individualidad: Cuando está motivado, actúa de una manera directa y positiva ante la oposición. Es una persona fuerte que toma posición y lucha por mantenerla. Está dispuesto a tomar riesgos y puede aún ignorar niveles jerárquicos.";
          } else if ($maxL === 'L2' && $minL === 'L1') {
            $interpretacionL = "Motivación: Buena voluntad: Cuando está motivado, tiende a comportarse de forma equilibrada y cordial, desplegando 'agresividad social' en situaciones que percibe como favorables y sin amenazas. Tiende a mostrarse simpático y a establecer relaciones armoniosas con la gente desde el primer contacto.";
          } else if ($maxL === 'L2' && $minL === 'L3') {
            $interpretacionL = "Motivación: Habilidad de contactos: Cuando está motivado, tiende a buscar a la gente con entusiasmo y chispa. Es una persona abierta que despliega un optimismo contagioso y trata de ganarse a la gente a través de la persuasión de un acercamiento sociable.";
          } else if ($maxL === 'L2' && $minL === 'L4') {
            $interpretacionL = "Motivación: Confianza en sí mismo: Cuando está motivado, despliega confianza en sí mismo en la mayoría de sus tratos con otras personas. Aunque siempre lucha por ganarse a la gente, se muestra reacio a ceder su propio punto de vista. Esta persona tiende a no aguantar que una situación se presente, él será capaz de resolverla.";
          } else if ($maxL === 'L3' && $minL === 'L1') {
            $interpretacionL = "Motivación: Paciencia: Cuando está motivado, tiende a ser constante y consistente prefiriendo tratar un proyecto o tarea a la vez. En general, esta persona dirigirá sus habilidades y experiencias hacia áreas que requieren profundidad y especialización. Ecuánime bajo las presiones, busca estabilidad.";
          } else if ($maxL === 'L3' && $minL === 'L2') {
            $interpretacionL = "Motivación: Reflexión (Concentración): Cuando está motivado, tiende a ser un individuo controlado y paciente. Se mueve con moderación y premeditación en la mayoría de las situaciones con cuidado y concentración.";
          } else if ($maxL === 'L3' && $minL === 'L4') {
            $interpretacionL = "Motivación: Persistencia: Cuando está motivado, tiende a ser un individuo persistente y perseverante que una vez que decide algo, no fácilmente se desvía de su objetivo. Tenderá a tomar un ritmo de trabajo y a apegarse a él. Puede ser rígido e independiente cuando se aplica la fuerza para hacerle cambiar.";
          } else if ($maxL === 'L4' && $minL === 'L1') {
            $interpretacionL = "Motivación: Adaptabilidad: Cuando está motivado, tiende a actuar de una forma cuidadosa y conservadora en general. Está dispuesto a modificar o transigir en su posición con el objeto de lograr sus objetivos. Siendo un estricto observador de las políticas, puede aparecer arbitrario y poco flexible al seguir.";
          } else if ($maxL === 'L4' && $minL === 'L2') {
            $interpretacionL = "Motivación: Perfeccionismo: Cuando está motivado, esta persona tiende a ser un seguidor exacto de las órdenes y los sistemas. Toma decisiones basadas en hechos conocidos o procedimientos establecidos. En todas sus actividades, trata meticulosamente de apegarse a los estándares establecidos, ya sea por sí mismo o por los demás.";
          } else if ($maxL === 'L4' && $minL === 'L3') {
            $interpretacionL = "Motivación: Sensibilidad: Cuando está motivado, esta persona estará muy consciente en evitar riesgos o problemas. Tiende a buscar significados ocultos. La tensión puede ser evidente particularmente si está bajo presión por obtener resultados. En general, se sentirá intranquilo mientras que no tenga una seguridad completa.";
          } else {
            $interpretacionL = "No se pudo determinar una interpretación con los datos proporcionados.";
          }

          if ($maxT === 'T1' && $minT === 'T2') {
            $interpretacionT = "Presión: Creatividad: Bajo presión, tiende a ser lógico, crítico e incisivo en sus enfoques hacia la obtención de metas. Se siente retado por problemas que requieren esfuerzos de análisis y originalidad. Será llano y crítico con la gente.";
          } else if ($maxT === 'T1' && $minT === 'T3') {
            $interpretacionT = "Presión: Empuje: Bajo presión, responde rápidamente a los retos, demostrando movilidad y flexibilidad en sus enfoques. Tiende a ser iniciador versátil respondiendo rápidamente a la competencia.";
          } else if ($maxT === 'T1' && $minT === 'T4') {
            $interpretacionT = "Presión: Individualidad: Bajo presión, actúa de una manera directa y positiva ante la oposición. Es una persona fuerte que toma posición y lucha por mantenerla. Está dispuesto a tomar riesgos y puede aún ignorar niveles jerárquicos.";
          } else if ($maxT === 'T2' && $minT === 'T1') {
            $interpretacionT = "Presión: Buena voluntad: Bajo presión, tiende a comportarse de forma equilibrada y cordial, desplegando 'agresividad social' en situaciones que percibe como favorables y sin amenazas. Tiende a mostrarse simpático y a establecer relaciones armoniosas con la gente desde el primer contacto.";
          } else if ($maxT === 'T2' && $minT === 'T3') {
            $interpretacionT = "Presión: Habilidad de contactos: Bajo presión, tiende a buscar a la gente con entusiasmo y chispa. Es una persona abierta que despliega un optimismo contagioso y trata de ganarse a la gente a través de la persuasión de un acercamiento sociable.";
          } else if ($maxT === 'T2' && $minT === 'T4') {
            $interpretacionT = "Presión: Confianza en sí mismo: Bajo presión, despliega confianza en sí mismo en la mayoría de sus tratos con otras personas. Aunque siempre lucha por ganarse a la gente, se muestra reacio a ceder su propio punto de vista. Esta persona tiende a no aguantar que una situación se presente, él será capaz de resolverla.";
          } else if ($maxT === 'T3' && $minT === 'T1') {
            $interpretacionT = "Presión: Paciencia: Bajo presión, tiende a ser constante y consistente prefiriendo tratar un proyecto o tarea a la vez. En general, esta persona dirigirá sus habilidades y experiencias hacia áreas que requieren profundidad y especialización. Ecuánime bajo las presiones, busca estabilidad.";
          } else if ($maxT === 'T3' && $minT === 'T2') {
            $interpretacionT = "Presión: Reflexión (Concentración): Bajo presión, tiende a ser un individuo controlado y paciente. Se mueve con moderación y premeditación en la mayoría de las situaciones con cuidado y concentración.";
          } else if ($maxT === 'T3' && $minT === 'T4') {
            $interpretacionT = "Presión: Persistencia: Bajo presión, tiende a ser un individuo persistente y perseverante que una vez que decide algo, no fácilmente se desvía de su objetivo. Tenderá a tomar un ritmo de trabajo y a apegarse a él. Puede ser rígido e independiente cuando se aplica la fuerza para hacerle cambiar.";
          } else if ($maxT === 'T4' && $minT === 'T1') {
            $interpretacionT = "Presión: Adaptabilidad: Bajo presión, tiende a actuar de una forma cuidadosa y conservadora en general. Está dispuesto a modificar o transigir en su posición con el objeto de lograr sus objetivos. Siendo un estricto observador de las políticas, puede aparecer arbitrario y poco flexible al seguir.";
          } else if ($maxT === 'T4' && $minT === 'T2') {
            $interpretacionT = "Presión: Perfeccionismo: Bajo presión, esta persona tiende a ser un seguidor exacto de las órdenes y los sistemas. Toma decisiones basadas en hechos conocidos o procedimientos establecidos. En todas sus actividades, trata meticulosamente de apegarse a los estándares establecidos, ya sea por sí mismo o por los demás.";
          } else if ($maxT === 'T4' && $minT === 'T3') {
            $interpretacionT = "Presión: Sensibilidad: Bajo presión, esta persona estará muy consciente en evitar riesgos o problemas. Tiende a buscar significados ocultos. La tensión puede ser evidente particularmente si está bajo presión por obtener resultados. En general, se sentirá intranquilo mientras que no tenga una seguridad completa.";
          } else {
            $interpretacionT = "No se pudo determinar una interpretación con los datos proporcionados.";
          }

    $data['maxCleaver'] = array(
        'maxM' => array('celda' => $maxM, 'valor' => $M_values[$maxM], 'interpretacionM' => $interpretacionM),
        'maxL' => array('celda' => $maxL, 'valor' => $L_values[$maxL], 'interpretacionL' => $interpretacionL),
        'maxT' => array('celda' => $maxT, 'valor' => $T_values[$maxT],'interpretacionT'=> $interpretacionT)
    );
  }


        //Obtengo cantidades 
        $resultado = $this->CandidatoModel->masGrande($idCandidato);
        $tipoCasilla = $resultado->temperamento_mas_grande;

        $temperamento = '';
        $texto = '';
        $emociones = '';
        $trabajo = '';
        $familia = '';
        $amigo = '';
        //DEBILIDADES:
        $emocionesD = '';
        $trabajoD = '';
        $familiaD = '';
        $amigoD = '';
        //DEBILIDADES:

        if (strtolower($tipoCasilla) === 'melancolico') {
            $temperamento = 'Melancólico';
            $texto = 'El introvertido, el pensador, el pesimista';
            $emociones = 'Profundo y pensador, analítico, serio determinado, propenso a ser un genio, talentoso, creativo, filósofo, poeta, aprecia todo lo bello, sencible a otros, abnegado, meticuloso, idealista';
            $trabajo = 'Prefiere seguir un horario, perfeccionista, detallista, persistente, concienzudo, de habitos ordenados, económico, anticipa problemas potenciales, descubre soluciones creativas, necesita terminar lo que empieza, le encantan las gráficas, mapas, listas, etc.';
            $familia = 'Establece normas elevadas, quiere que todo se haga correctamente, mantiene ordenada su casa, recoge el desorden de los hijos, se sacrifica por los demás, fomenta el talento y el estudio.';
            $amigo = 'Esoge sus amigos cuidadosamente, prefiere quedar entre bastidores, evita llamar la atención, fiel, leal, atento a quejas, soluciona los problemas ajenos, se interesa por los demás, se conmueve fácilmente, busca la pareja ideal.';
            //DEBILIDADES:
            $emocionesD = 'Recuerda lo negativo, amanerado, deprimido, le agrada que lo hieran falsa humildad, vive en otro mundo, tiene mala imagen de si mismo, escucha lo que le conviene, se concentra en si mismo, tiene sentimientos de culpabilidad, sufre complejos de persecución, tiede a ser hipocrondríaco.';
            $trabajoD = 'No se orienta hacia las personas, se deprime ante las iperfecciones escoge trabajos dificiles, vacila al empezar proyectos nuevos, emplea demasiado tiempo planeando, prefiere analizar antes de trabajar, se auto-desaprueba, dificil de complacer, estandares demasiado altos, siente una gran necesidad de aprobación. ';
            $familiaD = 'Coloca metas demasiado altas, puede llegar a desanimar a los niños, puede ser meticuloso, se convierte en martir, le echa la culpa a los niños, se amohina ante los desacuerdos';
            $amigoD = 'Vive a través de otros, socialmente inseguro, retraído y remoto, critica a otros, rechaza muestras de afecto, le disgusta la oposición, sospecha de las personas, antagonista y vengativo, no perdona, lleno de contradicciones, recibe los compulidos con exceptisismo.';
        } else if (strtolower($tipoCasilla) === 'flematico') {
            $temperamento = 'Flemático';
            $texto = 'El introvertido, el observador, el pesimista';
            $emociones = 'Personalidad tranquila, sereno, relajado, imperturbable, paciente, equilibrado, una vida consistente, callado pero de buen humor, amable y compasivo, no muestra sus emociones, contento con la vida';
            $trabajo = 'Competente y estable, apacible y simpático, tiene capacidades administrativas, mediador, evita conflictos, trabaja bien bajo presión, busca el camino fácil.';
            $familia = 'Es buen padre, dedica tiempo a sus hijos, no tiene afán, no se inquieta fácilmente.';
            $amigo = 'Es de buen talante, discreto, dispuesto a escuchar, disfruta observando a la gente, tiene muchos amigos, es compasivo y comprensivo.';

            $emocionesD = 'Apático, temeroso y preocupado, indeciso, evita tomar responsabilidades, voluntad de hierro, egoísta , tímido y reticente, se compromete demasiado, santurrón.';
            $trabajoD = 'Sin metas, falto de auto-motivacion, le es difícil mantenerse en acción, le disgusta que lo acosen, perezoso y sin cuidado, desanima a los otros, prefiere observar antes que actuar. ';
            $familiaD = 'Flojos en la disciplina, no organiza el hogar, toma la vida demasiado fácil.';
            $amigoD = 'impide el entusiasmo, no se involucra, impacible, indiferente a los planes, juzga a los demás, sacástico, se resiste a los cambios.';
        } else if (strtolower($tipoCasilla) === 'colerico') {
            $temperamento = 'Colérico';
            $texto = 'EL EXTROVERTIDO, EL ACTIVISTA, EL OPTIMISTA';
            $emociones = 'Líder nato, dinámico y activo, una necesidad compulsiva para el cambio, actúa
        con rapidez, quiere corregir las injusticias, impasible, no se desanima fácilmente, independiente y autosuficiente, confiado en si mismo, puede manejar cualquier proyecto.';
            $trabajo = 'Se propone metas, organiza bien, busca soluciones prácticas, actúa con rapidez, delega el trabajo, exige productividad, cumple lo propuesto, estimula actividad, 
        le interesa poco la oposición.';
            $familia = 'Ejerce liderazgo sólido, establece metas, motiva su familia a actuar, sabe la respuesta correcta, organiza el hogar.';
            $amigo = 'Poco amigable, organiza el trabajo en grupo, dispuesto a liderar, casi siempre tiene razón, se destaca en emergencias.';

            $emocionesD = 'Mandón, impaciente, temperamental, tenso, demaciado impetuoso, se deleita en la controversia, no se rinde a pesar de perder, inflexible, le disgustan las lágrimas y las emociones, no muestra simpatía hacia los demás.';
            $trabajoD = 'Intolerante ante los errores, no analiza los detalles, trivialidades le aburren, puede tomar desiciones temerarias puede ser rudo y sin tacto, manipula a las personas, el fin justifica los medios, el trabajo puede llegar a ser su Dios, demanda lealtad de parte de sus subordinados.';
            $familiaD = 'Tiende a ser dominante, demasiado ocupado para dar tiempo a su familia, contesta demasiado rápido, se impacienta con los que no tienen buen desempeño, impide que los hijos se relajen, puede hacer que los hijos se depriman.';
            $amigoD = 'Tiende a usar a las personas, domina a los demás, decide por otros, sabe todo, todo lo puede hacer mejor, demasiado independiente, posesivo con los amigos y compañeros, no puede decir "lo siento" puede estar en lo correcto y ser impopular.';
        } else if (strtolower($tipoCasilla) === 'sanguineo') {
            $temperamento = 'Sanguineo';
            $texto = 'El extrovertido, el hablador, el optimista';
            $emociones = 'Personalidad atractiva, conversador, anecdotista, el alma de la fiesta, buen sentido del humor, ojos para los colores, toca a la gente cuando habla, entusiasta y democrático, alegre y burbujeante, curioso, buen actor, ingenuo e inocente, vive por el momento, carácter variable, en el fondo es sincero, siempre es un niño.';
            $trabajo = 'Se ofrece a trabajar, planea nuevos proyectos, creativo, tiene enrgia y entusiasmo, causa buena impresión inicial, inspira a los demás, convence a otros que trabajen.';
            $familia = 'Hace que la vida en casa sea divertida, los amigos de sus hijos lo quieren, convierte los desastres en situaciones divertidas, es el director del circo.';
            $amigo = 'Hace amigos con facilidad, tiene el don de gente, le encantan los cumplidos, parece excitante, envidiado por los demás, no guarda rencor, se disculpa rápidamente, animas las reuniones, le gustan las actividades espontáneas.';

            $emocionesD = 'Prefiere hablar, olvida sus obligaciones, no persiste, su cofianza de desvanece rápidamente, indisciplinado, sus prioridades estan fuera de orden, toma decisiones llevado por sus sentimientos, se distrae fácilmente, malgasta el tiempo hablando.';
            $trabajoD = 'Se ofrece a trabajar, planea nuevos proyectos, creativo, tiene enrgia y entusiasmo, causa buena impresión inicial, inspira a los demás, convence a otros que trabajen.';
            $familiaD = 'Mantiene el hogar en estado de frenesí, olvida las citas delos hijos, desorganizado, no escucha el asunto completo.';
            $amigoD = 'Odia estar a solas necesita ser el centro de atención, quiere ser popular, busca recibir el crédito por su acciones, doina la conversación, interrumpe y no escucha, contesta por otros, olvidadizo, siempre encuentra excusas, repite sus historias.';

        } else {
            // Manejo para cuando $tipoCasilla está vacío
            $temperamento = '';
            $texto = 'Sin datos';
            $emociones = 'Sin datos';
            $trabajo = 'Sin datos';
            $familia = 'Sin datos';
            $amigo = 'Sin datos';
            // DEBILIDADES:
            $emocionesD = 'Sin datos';
            $trabajoD = 'Sin datos';
            $familiaD = 'Sin datos';
            $amigoD = 'Sin datos';
        }

        $data['textoFortaleza'] = array(
            'texto' => $texto,
            'temperamento' => $temperamento,
            'emociones' => $emociones,
            'trabajo' => $trabajo,
            'familia' => $familia,
            'amigo' => $amigo,
            'emocionesD' => $emocionesD,
            'trabajoD' => $trabajoD,
            'familiaD' => $familiaD,

            'amigoD' => $amigoD,
        );

        $this->load->view('Candidato/ConsultarPerfil', $data);

    }


    ///SECCION PARA GUARDAR DATOS

    public function guardarNotas()
    {

        $DPI = $this->input->post('DPI');
        $notas = $this->input->post('notas');

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;


        $this->CandidatoModel->guardarAnotaciones($idCandidato, $notas);

        $this->VerCandidato($idCandidato);



    }

    public function guardarValanti()
    {

        $DPI = $this->input->post('DPI');
        $Verdad = $this->input->post('Verdad');
        $Rectitud = $this->input->post('Rectitud');
        $Paz = $this->input->post('Paz');
        $Amor = $this->input->post('Amor');
        $NoViolencia = $this->input->post('NoViolencia');

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;


        $this->CandidatoModel->guardarValanti($idCandidato, $Verdad, $Rectitud, $Paz, $Amor, $NoViolencia);

        $this->VerCandidato($idCandidato);



    }

    public function activarTemperamento($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato;

        $this->CandidatoModel->activarTemperamento($idCandidato);

        $this->VerCandidato($idCandidato);



    }

    public function desactivarTemperamento($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato;

        $this->CandidatoModel->desactivarTemperamento($idCandidato);



        $this->VerCandidato($idCandidato);



    }

    public function activarbriggs($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato;
        // Verifica si existe un registro para el idCandidato en la tabla Briggs
        $existeRegistroBriggs = $this->CandidatoModel->existeRegistroBriggs($idCandidato);
        if ($existeRegistroBriggs) {

            $this->CandidatoModel->activarbriggs($idCandidato); // Esto coloca 1 en la tabla Briggs
        } else {
            $this->CandidatoModel->insertarRegistroBriggs($idCandidato); //Creo un registro para almacenar los resultados del briggs
            $this->CandidatoModel->activarbriggs($idCandidato); // Esto coloca 1 en la tabla Briggs

        }
        $this->VerCandidato($idCandidato); //esto me dirige a la pantalla principal 
    }



    public function desactivarbriggs($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato;

        $this->CandidatoModel->desactivarbriggs($idCandidato);

        $this->VerCandidato($idCandidato);



    }

    public function activarValanti($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato

        $idCandidato = $data['Candidato']->idCandidato;
        // Verifica si existe un registro para el idCandidato en la tabla Briggs

        $existeRegistroValanti = $this->CandidatoModel->existeRegistroValanti($idCandidato);

        if ($existeRegistroValanti) {

            $this->CandidatoModel->activarValanti($idCandidato); // Esto coloca 1 en la tabla Briggs
        } else {
            $this->CandidatoModel->insertarRegistroValanti($idCandidato); //Creo un registro para almacenar los resultados del briggs
            $this->CandidatoModel->activarValanti($idCandidato); // Esto coloca 1 en la tabla Briggs

        }
        $this->VerCandidato($idCandidato); //esto me dirige a la pantalla principal 
    }
    public function desactivarValanti($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        $this->CandidatoModel->desactivarValanti($idCandidato);
        $this->VerCandidato($idCandidato);
    }
    public function activarpf($DPI)
    {
        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        // Verifica si existe un registro para el idCandidato en la tabla 

        $existeregistro = $this->CandidatoModel->existe16pf($idCandidato);

        if ($existeregistro) {

            $this->CandidatoModel->activar16pf($idCandidato); // Esto coloca 1 en la tabla Briggs
        } else {
            $this->CandidatoModel->crearregistro16pf($idCandidato); //Creo un registro para almacenar los resultados del briggs
            $this->CandidatoModel->activar16pf($idCandidato); // Esto coloca 1 en la tabla Briggs

        }
        $this->VerCandidato($idCandidato); //esto me dirige a la pantalla principal 


    }

    public function desactivarpf($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        $this->CandidatoModel->desactivarpf($idCandidato);
        $this->VerCandidato($idCandidato);
    }

    public function activarCleaver($DPI)
    {
        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        // Verifica si existe un registro para el idCandidato en la tabla 

        $existeregistro = $this->CandidatoModel->existecleaver($idCandidato);

        if ($existeregistro) {

            $this->CandidatoModel->activarCleaver($idCandidato); // Esto coloca 1 en la tabla Briggs
            

          
              
          // Insertar los nuevos valores en la tabla `graficaCleaver`
          
        } else {
            $this->CandidatoModel->crearRegistroCleaver($idCandidato); //Creo un registro para almacenar los resultados del briggs
            $this->CandidatoModel->activarCleaver($idCandidato); // Esto coloca 1 en la tabla Briggs

        }
        $this->VerCandidato($idCandidato); //esto me dirige a la pantalla principal 


    }

    public function deactivarCleaver($DPI)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        $this->CandidatoModel->desactivarcleaver($idCandidato);
        $this->VerCandidato($idCandidato);
    }

    public function reporte($idCandidato)
    {
        $data['candidato_data'] = $this->CandidatoModel->getCandidatoPorId($idCandidato);

        $html = $this->load->view('Reporte', $data, true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function reiniciarDatos($DPI, $prueba)
    {
      $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
      $idCandidato = $data['Candidato']->idCandidato;

      $this->CandidatoModel->resetPrueba($idCandidato, $prueba);

      $this->VerCandidato($idCandidato);



    }

    public function desactivarPruebas($DPI, $prueba)
    {

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        $this->CandidatoModel->desactivarPrueba($idCandidato, $prueba);
        $this->VerCandidato($idCandidato);
    }

    public function activarPruebas($DPI, $prueba)
    {
// crear la logica para activar la prueba 16/09
        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;
        $this->CandidatoModel->activarPrueba($idCandidato, $prueba);
        $this->VerCandidato($idCandidato);
    }


	public function obtenerCandidato($DPI)
	{
		$data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
		$idCandidato = $data['Candidato']->idCandidato;


		$this->verCandidato($idCandidato);
	}

	public function obtenerCandidatoPlaza($DPI,$plaza)
	{
		$data['Candidato'] = $this->CandidatoModel->VerificarDPIPlaza($DPI,$plaza); // Obtener los datos del candidato
		$idCandidato = $data['Candidato']->idCandidato;
		$this->verCandidato($idCandidato);
	}

  public function PostComment()
  {
    $idCandidato = $this->input->post('idCandidato');
    $etapa= $this->input->post('etapa');
    $comentario = $this->input->post('comentario');
    $this->CandidatoModel->guardarComentario($idCandidato, $comentario, $etapa);
    $this->verCandidato($idCandidato);
  }

  public function agregarComentario()
{
    try {
        $data = json_decode(file_get_contents('php://input'), true);

        log_message('debug', 'Datos recibidos: ' . json_encode($data));

        $idCandidato = $data['idCandidato'] ?? null;
        $etapa = $data['etapa'] ?? null;
        $comentario = $data['comentario'] ?? null;

        if ($idCandidato && $etapa && $comentario) {
            $this->CandidatoModel->guardarComentario($idCandidato, $etapa, $comentario);
            log_message('debug', 'Comentario guardado con éxito.');
            echo json_encode([
                'success' => true,
                'message' => 'Comentario agregado correctamente.'
            ]);
        } else {
            log_message('error', 'Datos incompletos recibidos: ' . json_encode($data));
            echo json_encode([
                'success' => false,
                'message' => 'Datos incompletos.'
            ]);
        }
    } catch (Exception $e) {
        log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => 'Error interno del servidor.'
        ]);
    }
}

public function rechazarCandidato()
{
    try {
        // Obtén los datos enviados en el cuerpo de la solicitud (JSON)
        $data = json_decode(file_get_contents('php://input'), true);

        log_message('debug', 'Datos recibidos: ' . json_encode($data));

        // Extrae los valores de idCandidato y comentarios
        $idCandidato = $data['idCandidato'] ?? null;
        $comentario = $data['comentarios'] ?? null;

        // Verifica si los datos son válidos
        if ($idCandidato && $comentario) {
            // Llama al modelo para registrar el rechazo
            $this->CandidatoModel->rechazarCandidato($idCandidato, $comentario);
            log_message('debug', 'Candidato rechazado con éxito.');

            // Obtén los datos necesarios para el correo
            $candidato = $this->CandidatoModel->getCandidatoPorId($idCandidato);

            // Verifica que el candidato y su correo existan
            if (empty($candidato) || empty($candidato->Correo)) {
                log_message('error', 'El candidato no tiene un correo definido.');
                echo json_encode([
                    'success' => false,
                    'message' => 'El candidato no tiene un correo definido.'
                ]);
                return;
            }

            // Datos para la plantilla de correo
            $datosCorreo = [
                'nombreCandidato' => $candidato->Nombres,
            ];

            // Carga y utiliza la biblioteca Correo para enviar el email
            $this->load->library('correo');
            if ($this->correo->enviarCorreo($candidato->Correo, 'Actualización de la Plaza', 'Rechazo', $datosCorreo)) {
                log_message('debug', 'Correo de rechazo enviado con éxito.');
                echo json_encode([
                    'success' => true,
                    'message' => 'Candidato rechazado y notificación enviada.'
                ]);
            } else {
                log_message('error', 'Error al enviar el correo de rechazo.');
                echo json_encode([
                    'success' => false,
                    'message' => 'Candidato rechazado, pero no se pudo enviar la notificación.'
                ]);
            }
        } else {
            // Datos incompletos
            log_message('error', 'Datos incompletos recibidos: ' . json_encode($data));
            echo json_encode([
                'success' => false,
                'message' => 'Datos incompletos.'
            ]);
        }
    } catch (Exception $e) {
        // Manejo de excepciones
        log_message('error', 'Error al procesar la solicitud: ' . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => 'Error interno del servidor.'
        ]);
    }
}


public function ContinuarProceso($idCandidato, $proceso)
{
    $this->CandidatoModel->AvanzarFase($idCandidato, $proceso);
    $this->verCandidato($idCandidato);
}

public function ProgramarEvento($idCandidato, $tipoEvento)
{
    // Obtiene los datos enviados desde el formulario
    $fecha = $this->input->post('fechaEntrevista');
    $hora = $this->input->post('horaEntrevista');
    $lugar = $this->input->post('lugarEntrevista');

    // Prepara los datos para la inserción
    $data = [
        'TipoEvento' => $tipoEvento,
        'Fecha' => $fecha,
        'Hora' => $hora,
        'Lugar' => $lugar,
        'IdCandidato' => $idCandidato,
    ];

    // Llama al modelo para insertar los datos
    $this->CandidatoModel->programarEntrevista($data);

    // Obtén los datos necesarios para el correo
    $candidato = $this->CandidatoModel->getCandidatoPorId($idCandidato);

    // Asegúrate de que el candidato existe y tiene un correo válido
    if (empty($candidato) || empty($candidato->Correo)) {
        echo 'Error: No se encontraron datos del candidato o el correo no está definido.';
        return;
    }

    // Datos para la plantilla de correo estas variables las usare en la plantilla
    $datosCorreo = [
        'nombreCandidato' => $candidato->Nombres,
        'fecha' => $fecha,
        'hora' => $hora,
        'direccion' => $lugar,
    ];

    // Carga y utiliza la biblioteca Correo para enviar el email
    $this->load->library('correo');
    if ($this->correo->enviarCorreo($candidato->Correo, 'Entrevista Programada', 'Entrevista', $datosCorreo)) {
        echo 'Correo enviado con éxito.';
    } else {
        echo 'Error al enviar el correo.';
    }

    // Redirige o muestra la vista del candidato
    $this->verCandidato($idCandidato);
}


}
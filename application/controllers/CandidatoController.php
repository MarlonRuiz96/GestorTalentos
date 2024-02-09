<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';
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
            $nombres = "";
            $Puesto = "";
            $DPI = $this->input->post('DPI');
            $Temperamento = 0;
            $Contacto = "";
            $correo = "";




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


        $data['candidato_data'] = $this->CandidatoModel->getCandidatoPorId($idCandidato);
        $data['dataTemperamento'] = $this->CandidatoModel->getDatosPrueba($idCandidato);
        $data['dataBriggs'] = $this->CandidatoModel->getDatosBriggs($idCandidato);
        $data['dataValanti'] = $this->CandidatoModel->getDatosValanti($idCandidato);

        //$IdCandidato = $data['candidato_data']->idCandidato;

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

    public function reporte($idCandidato)
    {
        $data['candidato_data'] = $this->CandidatoModel->getCandidatoPorId($idCandidato);

        $html = $this->load->view('reporte', $data, true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }
}

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CandidatoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CandidatoModel');
        $this->load->helper('autenticacion');
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
        $IdCandidato = $data['candidato_data']->idCandidato;
        $data['Fortaleza'] = $this->CandidatoModel->getFortaleza($IdCandidato);
        $data['Debilidad'] = $this->CandidatoModel->getDebilidad($IdCandidato);

        $temperamento = '';
        $texto = '';
        $emociones= '';
        $trabajo = '';
        $familia = '';
        $amigo = '';
        $tipo = '';

        if($data['Fortaleza']->cantidad > $data['Debilidad']->cantidad){

            $tipoFortaleza = $data['Fortaleza']->Tipo;

            $tipo = 'Fortalezas';


            
            //LAS FORTALEZAS
            if ($tipoFortaleza == 'A'):
                $temperamento = 'Melancólico';
                $texto = 'El introvertido, el pensador, el pesimista';
                $emociones ='Profundo y pensador, analítico, serio determinado, propenso a ser un genio, talentoso, creativo, filósofo, poeta, aprecia todo lo bello, sencible a otros, abnegado, meticuloso, idealista';
                $trabajo= 'Prefiere seguir un horario, perfeccionista, detallista, persistente, concienzudo, de habitos ordenados, económico, anticipa problemas potenciales, descubre soluciones creativas, necesita terminar lo que empieza, le encantan las gráficas, mapas, listas, etc.';
                $familia = 'Establece normas elevadas, quiere que todo se haga correctamente, mantiene ordenada su casa, recoge el desorden de los hijos, se sacrifica por los demás, fomenta el talento y el estudio.';
                $amigo = 'Esoge sus amigos cuidadosamente, prefiere quedar entre bastidores, evita llamar la atención, fiel, leal, atento a quejas, soluciona los problemas ajenos, se interesa por los demás, se conmueve fácilmente, busca la pareja ideal.';
;
    
            elseif ($tipoFortaleza == 'B'):
                $temperamento = 'Flemático';
                $texto = 'El introvertido, el observador, el pesimista';
                $emociones ='Personalidad tranquila, sereno, relajado, imperturbable, paciente, equilibrado, una vida consistente, callado pero de buen humor, amable y compasivo, no muestra sus emociones, contento con la vida';
                $trabajo= 'Competente y estable, apacible y simpático, tiene capacidades administrativas, mediador, evita conflictos, trabaja bien bajo presión, busca el camino fácil.';
                $familia = 'Es buen padre, dedica tiempo a sus hijos, no tiene afán, no se inquieta fácilmente.';
                $amigo = 'Es de buen talante, discreto, dispuesto a escuchar, disfruta observando a la gente, tiene muchos amigos, es compasivo y comprensivo.';
;
    
            elseif ($tipoFortaleza == 'C'):
                $temperamento = 'Colérico';
                 $texto = 'EL EXTROVERTIDO, EL ACTIVISTA, EL OPTIMISTA';
                $emociones ='Líder nato, dinámico y activo, una necesidad compulsiva para el cambio, actúa
                con rapidez, quiere corregir las injusticias, impasible, no se desanima fácilmente, independiente y autosuficiente, confiado en si mismo, puede manejar cualquier proyecto.';
                $trabajo= 'Se propone metas, organiza bien, busca soluciones prácticas, actúa con rapidez, delega el trabajo, exige productividad, cumple lo propuesto, estimula actividad, 
                le interesa poco la oposición.';
                $familia = 'Ejerce liderazgo sólido, establece metas, motiva su familia a actuar, sabe la respuesta correcta, organiza el hogar.';
                $amigo = 'Poco amigable, organiza el trabajo en grupo, dispuesto a liderar, casi siempre tiene razón, se destaca en emergencias.';
            else:
                $temperamento = 'Sanguineo';
                $texto = 'El extrovertido, el hablador, el optimista';
                $emociones ='Personalidad atractiva, conversador, anecdotista, el alma de la fiesta, buen sentido del humor, ojos para los colores, toca a la gente cuando habla, entusiasta y democrático, alegre y burbujeante, curioso, buen actor, ingenuo e inocente, vive por el momento, carácter variable, en el fondo es sincero, siempre es un niño.';
                $trabajo= 'Se ofrece a trabajar, planea nuevos proyectos, creativo, tiene enrgia y entusiasmo, causa buena impresión inicial, inspira a los demás, convence a otros que trabajen.';
                $familia = 'Hace que la vida en casa sea divertida, los amigos de sus hijos lo quieren, convierte los desastres en situaciones divertidas, es el director del circo.';
                $amigo = 'Hace amigos con facilidad, tiene el don de gente, le encantan los cumplidos, parece excitante, envidiado por los demás, no guarda rencor, se disculpa rápidamente, animas las reuniones, le gustan las actividades espontáneas.';
;            endif;
    
           
        }else{
            $tipoDebilidad = $data['Debilidad']->Tipo;

            $tipo = 'Debilidades';


            
            //LAS FORTALEZAS
            if ($tipoDebilidad == 'A'):
                $temperamento = 'Melancólico';
                $texto = 'El introvertido, el pensador, el pesimista';
                $emociones ='Profundo y pensador, analítico, serio determinado, propenso a ser un genio, talentoso, creativo, filósofo, poeta, aprecia todo lo bello, sencible a otros, abnegado, meticuloso, idealista';
                $trabajo= 'Prefiere seguir un horario, perfeccionista, detallista, persistente, concienzudo, de habitos ordenados, económico, anticipa problemas potenciales, descubre soluciones creativas, necesita terminar lo que empieza, le encantan las gráficas, mapas, listas, etc.';
                $familia = 'Establece normas elevadas, quiere que todo se haga correctamente, mantiene ordenada su casa, recoge el desorden de los hijos, se sacrifica por los demás, fomenta el talento y el estudio.';
                $amigo = 'Esoge sus amigos cuidadosamente, prefiere quedar entre bastidores, evita llamar la atención, fiel, leal, atento a quejas, soluciona los problemas ajenos, se interesa por los demás, se conmueve fácilmente, busca la pareja ideal.';
;
    
            elseif ($tipoDebilidad == 'B'):
                $temperamento = 'Flemático';
                $texto = 'El introvertido, el observador, el pesimista';
                $emociones ='Personalidad tranquila, sereno, relajado, imperturbable, paciente, equilibrado, una vida consistente, callado pero de buen humor, amable y compasivo, no muestra sus emociones, contento con la vida';
                $trabajo= 'Competente y estable, apacible y simpático, tiene capacidades administrativas, mediador, evita conflictos, trabaja bien bajo presión, busca el camino fácil.';
                $familia = 'Es buen padre, dedica tiempo a sus hijos, no tiene afán, no se inquieta fácilmente.';
                $amigo = 'Es de buen talante, discreto, dispuesto a escuchar, disfruta observando a la gente, tiene muchos amigos, es compasivo y comprensivo.';
;
    
            elseif ($tipoDebilidad == 'C'):
                $temperamento = 'Colérico';
                 $texto = 'EL EXTROVERTIDO, EL ACTIVISTA, EL OPTIMISTA';
                $emociones ='Líder nato, dinámico y activo, una necesidad compulsiva para el cambio, actúa
                con rapidez, quiere corregir las injusticias, impasible, no se desanima fácilmente, independiente y autosuficiente, confiado en si mismo, puede manejar cualquier proyecto.';
                $trabajo= 'Se propone metas, organiza bien, busca soluciones prácticas, actúa con rapidez, delega el trabajo, exige productividad, cumple lo propuesto, estimula actividad, 
                le interesa poco la oposición.';
                $familia = 'Ejerce liderazgo sólido, establece metas, motiva su familia a actuar, sabe la respuesta correcta, organiza el hogar.';
                $amigo = 'Poco amigable, organiza el trabajo en grupo, dispuesto a liderar, casi siempre tiene razón, se destaca en emergencias.';
            else:
                $temperamento = 'Sanguineo';
                $texto = 'El extrovertido, el hablador, el optimista';
                $emociones ='Personalidad atractiva, conversador, anecdotista, el alma de la fiesta, buen sentido del humor, ojos para los colores, toca a la gente cuando habla, entusiasta y democrático, alegre y burbujeante, curioso, buen actor, ingenuo e inocente, vive por el momento, carácter variable, en el fondo es sincero, siempre es un niño.';
                $trabajo= 'Se ofrece a trabajar, planea nuevos proyectos, creativo, tiene enrgia y entusiasmo, causa buena impresión inicial, inspira a los demás, convence a otros que trabajen.';
                $familia = 'Hace que la vida en casa sea divertida, los amigos de sus hijos lo quieren, convierte los desastres en situaciones divertidas, es el director del circo.';
                $amigo = 'Hace amigos con facilidad, tiene el don de gente, le encantan los cumplidos, parece excitante, envidiado por los demás, no guarda rencor, se disculpa rápidamente, animas las reuniones, le gustan las actividades espontáneas.';
;            endif;
    
        }

        $data['textoFortaleza'] = array(
            'texto' => $texto,
            'tipo'=> $tipo,
            'temperamento' => $temperamento,
            'emociones'=> $emociones,
            'trabajo' => $trabajo,
            'familia' => $familia,
            'amigo' => $amigo,
        );

        $this->load->view('Candidato/ConsultarPerfil', $data);

    }



    public function guardarNotas()
    {

        $DPI = $this->input->post('DPI');
        $notas = $this->input->post('notas');

        $data['Candidato'] = $this->CandidatoModel->VerificarDPI($DPI); // Obtener los datos del candidato
        $idCandidato = $data['Candidato']->idCandidato;


        $this->CandidatoModel->guardarAnotaciones($idCandidato, $notas);

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


}

?>
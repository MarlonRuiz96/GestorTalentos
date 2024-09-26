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


    }
    public function index()
    {

        $this->load->view('Pruebas/Login');
    }

   

    public function login()
    {
        $DPI = $this->input->post('DPI');

        $validarDPI = $this->DpiModel->VerificarDPI($DPI);

        if ($validarDPI) {
            // Si el DPI es válido, obtén más información del candidato
            $this->load->model('CandidatoModel');
            $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);

            // Luego, carga la vista con los datos del candidato
            $this->load->view('Pruebas/Login', $data);
        } else {
            redirect('LoginController');
        }


    }

    public function guardarCambios()
    {
        // Recupera los datos del formulario
        $nombre = $this->input->post('Nombres');
        $contacto = $this->input->post('Contacto');
        $DPI = $this->input->post('DPI');
        $correo = $this->input->post('Correo');
        $puesto = $this->input->post('Puesto');

        // Realiza la actualización en la base de datos
        $this->DpiModel->actualizarDatos($nombre, $contacto, $DPI, $correo, $puesto);

        $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);


        // Redirecciona a la vista principal u otra página de confirmación
        $this->load->view('Pruebas/Login', $data);
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

    // Definimos las categorías y las preguntas asociadas
    $categorias = [
        'extrovertido' => range(1, 5),
        'introvertido' => range(6, 10),
        'sensorial'    => range(11, 15),
        'intuitivo'    => range(16, 20),
        'racional'     => range(21, 25),
        'emocional'    => range(26, 30),
        'calificador'  => range(31, 35),
        'perceptivo'   => range(36, 40),
    ];

    // Recorremos cada categoría y sus preguntas
    foreach ($categorias as $tipo => $preguntas) {
        foreach ($preguntas as $numero) {
            if ($this->input->post("respuesta$numero") == 'x') {
                $this->DpiModel->actualizarBriggs($idCandidato, $tipo);
            }
        }
    }

    $this->CandidatoModel->desactivarbriggs($idCandidato);

    // Actualizamos los datos del candidato
    $data['Candidato'] = $this->DpiModel->VerificarDPI($DPI);

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

        $this->DpiModel->actualizarSanguineo($DPI, $puntosactual); // Le sumo un punto a sanguineo

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
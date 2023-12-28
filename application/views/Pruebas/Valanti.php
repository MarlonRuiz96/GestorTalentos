<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">

    <title>Prueba Valanti </title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin-2.min.css'); ?>">
</head>

<body>
    <header>
        <h1>Prueba Valanti</h1>
    </header>
    <div class="container">
        <main>
            <div class="d-flex justify-content-start">
                <img src="<?php echo base_url('assets/img/logo.jpeg'); ?>" class="d-block" alt="Imagen"
                    style="width: 35%; height: auto;"><br><br>
                <p class="text-center"><br><br>Por favor, marque cero, uno, dos o tres puntos en las casillas del
                    centro, según la importancia que usted le da a cada frase en su vida personal.
                    Las únicas opciones de respuesta son 3-0, 0-3. 1-2 y 2-1, siempre la suma de las casillas de los dos
                    puntos sean 3


                </p>


            </div><br>
            <h2 style="text-align: center;">
                Por favor no abandone la prueba o quedará anulada..
            </h2>

            <br><br>

            <form method="post" action="<?= site_url('DpiController/procesarValanti') ?>">
                <input type="hidden" name="DPI" value="<?= $Candidato->DPI ?>">

                <table class="table">
                    <tr>
                        <td>1</td>
                        <td class="text-right">Dedico tiempo a las personas que están alrededor mío</td>
                        <td><input type="text" class="form-control" id="primeraA" name="primeraA" placeholder=""
                                onkeypress="return validarNumero(event, this)">
                        </td>
                        <td><input type="text" class="form-control" id="primeraB" name="primeraB" placeholder=""
                                onkeypress="return validarNumero(event, this)">
                        </td>
                        <td class="text-left">Actúo con perseverancia</td>
                    </tr>


                    <tr>
                        <td>2</td>
                        <td class="text-right">Soy tolerante</td>
                        <td><input type="text" class="form-control" id="segundaA" name="segundaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="segundaB" name="segundaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Prefiero actuar con ética</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="text-right">Al pensar, utilizo mi intuición o "sexto sentido"</td>
                        <td><input type="text" class="form-control" id="terceraA" name="terceraA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="terceraB" name="terceraB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Me siento una persona digna</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="text-right">Logro buena concentración mental</td>
                        <td><input type="text" class="form-control" id="cuartaA" name="cuartaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="cuartaB" name="cuartaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Perdono todas las ofensas de cualquier persona</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="text-right">Normalmente razono mucho</td>
                        <td><input type="text" class="form-control" id="quintaA" name="quintaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="quintaB" name="quintaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Me destaco por el liderazgo en mis acciones</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="text-right">Pienso con integridad</td>
                        <td><input type="text" class="form-control" id="sextaA" name="sextaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="sextaB" name="sextaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Me coloco objetivos y metas en mi vida personal</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="text-right">Soy una persona de iniciativa</td>
                        <td><input type="text" class="form-control" id="septimaA" name="septimaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="septimaB" name="septimaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">En mi trabajo normalmente soy curioso</td>
                    </tr>

                    <tr>
                        <td>8</td>
                        <td class="text-right">Doy amor</td>
                        <td><input type="text" class="form-control" id="octavaA" name="octavaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="octavaB" name="octavaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Para pensar hago síntesis de las distintas ideas</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="text-right">Me siento en calma</td>
                        <td><input type="text" class="form-control" id="novenaA" name="novenaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="novenaB" name="novenaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Pienso con veracidad</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <span class="text-center">
                                Por favor, marque cero, uno, dos o tres puntos en las casillas del centro para la frase
                                más inaceptable, según su juicio. El puntaje más alto será para la frase que indique lo
                                peor. Las únicas opciones de respuesta son: 3-0, 0-3, 2-1, 1-2. Siempre la suma de
                                puntos de las dos casillas debe ser 3.
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td class="text-right">Irrespetar la propiedad</td>
                        <td><input type="text" class="form-control" id="decimoA" name="decimoA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="decimoB" name="decimoB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Sentir inquietud</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="text-right">Ser irresponsable</td>
                        <td><input type="text" class="form-control" id="onceA" name="onceA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="onceB" name="onceB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Ser desconsiderado hacia cualquier persona</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="text-right">Caer en contradicciones al pensar</td>
                        <td><input type="text" class="form-control" id="doceA" name="doceA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="doceB" name="doceB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Sentir intolerancia</td>
                    </tr>

                    <tr>
                        <td>13</td>
                        <td class="text-right">Ser violento</td>
                        <td><input type="text" class="form-control" id="treceA" name="treceA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="treceB" name="treceB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Actuar con cobardía</td>
                    </tr>

                    <tr>
                        <td>14</td>
                        <td class="text-right">Sentirse presumido</td>
                        <td><input type="text" class="form-control" id="catorceA" name="catorceA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="catorceB" name="catorceB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Generar divisiones y discordia entre los seres humanos</td>
                    </tr>

                    <tr>
                        <td>15</td>
                        <td class="text-right">Ser cruel</td>
                        <td><input type="text" class="form-control" id="quinceA" name="quinceA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="quinceB" name="quinceB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Sentir ira</td>
                    </tr>

                    <tr>
                        <td>16</td>
                        <td class="text-right">Pensar con confusión</td>
                        <td><input type="text" class="form-control" id="dieciseisA" name="dieciseisA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="dieciseisB" name="dieciseisB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Tener odio en el corazón</td>
                    </tr>

                    <tr>
                        <td>17</td>
                        <td class="text-right">Decir blasfemias</td>
                        <td><input type="text" class="form-control" id="diecisieteA" name="diecisieteA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="diecisieteB" name="diecisieteB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Ser escandaloso</td>
                    </tr>

                    <tr>
                        <td>18</td>
                        <td class="text-right">Crear desigualdades entre los seres humanos</td>
                        <td><input type="text" class="form-control" id="dieciochoA" name="dieciochoA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="dieciochoB" name="dieciochoB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Apasionarse por una idea</td>
                    </tr>

                    <tr>
                        <td>19</td>
                        <td class="text-right">Sentirse inconstante</td>
                        <td><input type="text" class="form-control" id="diecinueveA" name="diecinueveA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="diecinueveB" name="diecinueveB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Crear rivalidad hacia otros</td>
                    </tr>

                    <tr>
                        <td>20</td>
                        <td class="text-right">Pensamientos irracionales</td>
                        <td><input type="text" class="form-control" id="veinteA" name="veinteA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veinteB" name="veinteB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Traicionar a un desconocido</td>
                    </tr>


                    <tr>
                        <td>21</td>
                        <td class="text-right">Ostentar las riquezas materiales</td>
                        <td><input type="text" class="form-control" id="veintiunoA" name="veintiunoA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintiunoB" name="veintiunoB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Sentirse infeliz</td>
                    </tr>

                    <tr>
                        <td>22</td>
                        <td class="text-right">Entorpecer la cooperación entre los seres humanos</td>
                        <td><input type="text" class="form-control" id="veintidosA" name="veintidosA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintidosB" name="veintidosB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">La maldad</td>
                    </tr>

                    <tr>
                        <td>23</td>
                        <td class="text-right">Odiar a cualquier ser de la naturaleza</td>
                        <td><input type="text" class="form-control" id="veintitresA" name="veintitresA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintitresB" name="veintitresB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Hacer distinciones entre las personas</td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td class="text-right">Sentirse intranquilo</td>
                        <td><input type="text" class="form-control" id="veinticuatroA" name="veinticuatroA"
                                placeholder="" onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veinticuatroB" name="veinticuatroB"
                                placeholder="" onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Ser infiel</td>
                    </tr>

                    <tr>
                        <td>25</td>
                        <td class="text-right">Tener la mente dispersa</td>
                        <td><input type="text" class="form-control" id="veinticincoA" name="veinticincoA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veinticincoB" name="veinticincoB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Mostrar apatía al pensar</td>
                    </tr>

                    <tr>
                        <td>26</td>
                        <td class="text-right">La injusticia</td>
                        <td><input type="text" class="form-control" id="veintiseisA" name="veintiseisA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintiseisB" name="veintiseisB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Sentirse angustiado</td>
                    </tr>

                    <tr>
                        <td>27</td>
                        <td class="text-right">Vengarse de los que odian a todo el mundo</td>
                        <td><input type="text" class="form-control" id="veintisieteA" name="veintisieteA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintisieteB" name="veintisieteB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Vengarse del que hace daño a un familiar</td>
                    </tr>

                    <tr>
                        <td>28</td>
                        <td class="text-right">Usar abusivamente el poder</td>
                        <td><input type="text" class="form-control" id="veintiochoA" name="veintiochoA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintiochoB" name="veintiochoB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Distraerse</td>
                    </tr>

                    <tr>
                        <td>29</td>
                        <td class="text-right">Ser desagradecido con los que ayudan</td>
                        <td><input type="text" class="form-control" id="veintinueveA" name="veintinueveA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="veintinueveB" name="veintinueveB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Ser egoísta con todos</td>
                    </tr>

                    <tr>
                        <td>30</td>
                        <td class="text-right">Cualquier forma de irrespeto</td>
                        <td><input type="text" class="form-control" id="treintaA" name="treintaA" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td><input type="text" class="form-control" id="treintaB" name="treintaB" placeholder=""
                                onkeypress="return validarNumero(event, this)"></td>
                        <td class="text-left">Odiar</td>
                    </tr>



                </table>

                <button type="button" class="btn btn-primary" onclick="validarYEnviar()">Enviar</button>

                <script>
                    function validarNumero(event, input) {
                        // Verifica si el carácter ingresado es un número entre 1 y 3
                        return (event.charCode >= 48 && event.charCode <= 51);
                    }

                    function validarYEnviar() {
                        if (!validarFila('primeraA', 'primeraB')) {
                            alert('En la fila 1 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('segundaA', 'segundaB')) {
                            alert('En la fila 2 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }
                        if (!validarFila('terceraA', 'terceraB')) {
                            alert('En la fila 3 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('cuartaA', 'cuartaB')) {
                            alert('En la fila 4 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }
                        if (!validarFila('quintaA', 'quintaB')) {
                            alert('En la fila 5 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('sextaA', 'sextaB')) {
                            alert('En la fila 6 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }
                        if (!validarFila('septimaA', 'septimaB')) {
                            alert('En la fila 7 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('octavaA', 'octavaB')) {
                            alert('En la fila 8 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }
                        if (!validarFila('decimoA', 'decimoB')) {
                            alert('En la fila 10 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('onceA', 'onceB')) {
                            alert('En la fila 11 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('doceA', 'doceB')) {
                            alert('En la fila 12 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('treceA', 'treceB')) {
                            alert('En la fila 13 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('catorceA', 'catorceB')) {
                            alert('En la fila 14 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('quinceA', 'quinceB')) {
                            alert('En la fila 15 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('dieciseisA', 'dieciseisB')) {
                            alert('En la fila 16 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('diecisieteA', 'diecisieteB')) {
                            alert('En la fila 17 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('dieciochoA', 'dieciochoB')) {
                            alert('En la fila 18 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('diecinueveA', 'diecinueveB')) {
                            alert('En la fila 19 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veinteA', 'veinteB')) {
                            alert('En la fila 20 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintiunoA', 'veintiunoB')) {
                            alert('En la fila 21 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintidosA', 'veintidosB')) {
                            alert('En la fila 22 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintitresA', 'veintitresB')) {
                            alert('En la fila 23 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veinticuatroA', 'veinticuatroB')) {
                            alert('En la fila 24 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veinticincoA', 'veinticincoB')) {
                            alert('En la fila 25 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintiseisA', 'veintiseisB')) {
                            alert('En la fila 26 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintisieteA', 'veintisieteB')) {
                            alert('En la fila 27 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintiochoA', 'veintiochoB')) {
                            alert('En la fila 28 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('veintinueveA', 'veintinueveB')) {
                            alert('En la fila 29 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }

                        if (!validarFila('treintaA', 'treintaB')) {
                            alert('En la fila 30 no se cumple lo indicado, recuerda que la suma tiene que dar 3');
                            return;
                        }



                        document.querySelector('form').submit();
                    }

                    function validarFila(input1, input2) {
                        var valor1 = parseInt(document.getElementById(input1).value) || 0;
                        var valor2 = parseInt(document.getElementById(input2).value) || 0;
                        var suma = valor1 + valor2;
                        return suma === 3;
                    }
                </script>
            </form>



    </div>

    </main>






</body>

</html>
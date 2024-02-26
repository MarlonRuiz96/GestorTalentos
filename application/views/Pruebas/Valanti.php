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
                        <td>
                            <input type="text" class="form-control" id="primera_1" name="primera" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">

                        </td>
                        <td>
                            <input type="text" class="form-control" id="segunda_1" name="segunda" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">

                        </td>
                        <td class="text-left">Actúo con perseverancia</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td class="text-right">Soy tolerante</td>
                        <td>
                            <input type="text" class="form-control" id="primera_2" name="primera" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="segunda_2" name="segunda" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        </td>
                        <td class="text-left">Prefiero actuar con ética</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td class="text-right">Al pensar, utilizo mi intuición o "sexto sentido"</td>
                        <td><input type="text" class="form-control" id="primera_3" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_3" name="terceraB" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Me siento una persona digna</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="text-right">Logro buena concentración mental</td>
                        <td><input type="text" class="form-control" id="primera_4" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_4" name="terceraB" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Perdono todas las ofensas de cualquier persona</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="text-right">Normalmente razono mucho</td>
                        <td><input type="text" class="form-control" id="primera_5" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_5" name="terceraB" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Me destaco por el liderazgo en mis acciones</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="text-right">Pienso con integridad</td>
                        <td><input type="text" class="form-control" id="primera_6" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_6" name="terceraB" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Me coloco objetivos y metas en mi vida personal</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="text-right">Soy una persona de iniciativa</td>
                        <td><input type="text" class="form-control" id="primera_7" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_7" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">En mi trabajo normalmente soy curioso</td>
                    </tr>

                    <tr>
                        <td>8</td>
                        <td class="text-right">Doy amor</td>
                        <td><input type="text" class="form-control" id="primera_8" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_8" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Para pensar hago síntesis de las distintas ideas</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="text-right">Me siento en calma</td>
                        <td><input type="text" class="form-control" id="primera_9" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_9" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
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
                        <td><input type="text" class="form-control" id="primera_10" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_10" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Sentir inquietud</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="text-right">Ser irresponsable</td>
                        <td><input type="text" class="form-control" id="primera_11" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_11" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Ser desconsiderado hacia cualquier persona</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="text-right">Caer en contradicciones al pensar</td>
                        <td><input type="text" class="form-control" id="primera_12" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_12" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Sentir intolerancia</td>
                    </tr>

                    <tr>
                        <td>13</td>
                        <td class="text-right">Ser violento</td>
                        <td><input type="text" class="form-control" id="primera_13" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_13" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Actuar con cobardía</td>
                    </tr>

                    <tr>
                        <td>14</td>
                        <td class="text-right">Sentirse presumido</td>
                        <td><input type="text" class="form-control" id="primera_14" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_14" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Generar divisiones y discordia entre los seres humanos</td>
                    </tr>

                    <tr>
                        <td>15</td>
                        <td class="text-right">Ser cruel</td>
                        <td><input type="text" class="form-control" id="primera_15" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_15" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Sentir ira</td>
                    </tr>

                    <tr>
                        <td>16</td>
                        <td class="text-right">Pensar con confusión</td>
                        <td><input type="text" class="form-control" id="primera_16" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_16" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Tener odio en el corazón</td>
                    </tr>

                    <tr>
                        <td>17</td>
                        <td class="text-right">Decir blasfemias</td>
                        <td><input type="text" class="form-control" id="primera_17" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_17" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Ser escandaloso</td>
                    </tr>

                    <tr>
                        <td>18</td>
                        <td class="text-right">Crear desigualdades entre los seres humanos</td>
                        <td><input type="text" class="form-control" id="primera_18" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_18" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Apasionarse por una idea</td>
                    </tr>

                    <tr>
                        <td>19</td>
                        <td class="text-right">Sentirse inconstante</td>
                        <td><input type="text" class="form-control" id="primera_19" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_19" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Crear rivalidad hacia otros</td>
                    </tr>

                    <tr>
                        <td>20</td>
                        <td class="text-right">Pensamientos irracionales</td>
                        <td><input type="text" class="form-control" id="primera_20" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_20" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Traicionar a un desconocido</td>
                    </tr>


                    <tr>
                        <td>21</td>
                        <td class="text-right">Ostentar las riquezas materiales</td>
                        <td><input type="text" class="form-control" id="primera_21" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_21" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Sentirse infeliz</td>
                    </tr>

                    <tr>
                        <td>22</td>
                        <td class="text-right">Entorpecer la cooperación entre los seres humanos</td>
                        <td><input type="text" class="form-control" id="primera_22" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_22" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">La maldad</td>
                    </tr>

                    <tr>
                        <td>23</td>
                        <td class="text-right">Odiar a cualquier ser de la naturaleza</td>
                        <td><input type="text" class="form-control" id="primera_23" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_23" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Hacer distinciones entre las personas</td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td class="text-right">Sentirse intranquilo</td>
                        <td><input type="text" class="form-control" id="primera_24" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_24" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Ser infiel</td>
                    </tr>

                    <tr>
                        <td>25</td>
                        <td class="text-right">Tener la mente dispersa</td>
                        <td><input type="text" class="form-control" id="primera_25" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_25" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Mostrar apatía al pensar</td>
                    </tr>

                    <tr>
                        <td>26</td>
                        <td class="text-right">La injusticia</td>
                        <td><input type="text" class="form-control" id="primera_26" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_26" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Sentirse angustiado</td>
                    </tr>

                    <tr>
                        <td>27</td>
                        <td class="text-right">Vengarse de los que odian a todo el mundo</td>
                        <td><input type="text" class="form-control" id="primera_27" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_27" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Vengarse del que hace daño a un familiar</td>
                    </tr>

                    <tr>
                        <td>28</td>
                        <td class="text-right">Usar abusivamente el poder</td>
                        <td><input type="text" class="form-control" id="primera_28" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_28" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Distraerse</td>
                    </tr>

                    <tr>
                        <td>29</td>
                        <td class="text-right">Ser desagradecido con los que ayudan</td>
                        <td><input type="text" class="form-control" id="primera_29" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_29" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Ser egoísta con todos</td>
                    </tr>

                    <tr>
                        <td>30</td>
                        <td class="text-right">Cualquier forma de irrespeto</td>
                        <td><input type="text" class="form-control" id="primera_30" name="terceraA" placeholder=""
                                onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td><input type="text" class="form-control" id="segunda_30" name="terceraB" placeholder=""
                        onchange="autocompletar(this.id)" onkeypress="return validarNumero(event, this)">
                        <td class="text-left">Odiar</td>
                    </tr>



                </table>

                <button type="submit" class="btn btn-primary">Enviar</button>

                <script>
                    function autocompletar(id) {
                        // Obtener el valor de la casilla
                        const valor = parseFloat(document.getElementById(id).value);

                        // Verificar si el valor es un número válido
                        if (!isNaN(valor)) {
                            // Obtener el prefijo del ID para identificar el tipo de campo (primera o segunda)
                            const prefijo = id.split('_')[0];

                            // Obtener el número del ID para identificar el índice de la fila
                            const indice = id.split('_')[1];

                            // Determinar el ID del otro campo
                            const otroCampoID = (prefijo === 'primera') ? `segunda_${indice}` : `primera_${indice}`;

                            // Calcular el valor del otro campo para que la suma sea siempre 3
                            const valorOtroCampo = 3 - valor;

                            // Asignar el valor al otro campo
                            document.getElementById(otroCampoID).value = valorOtroCampo;
                        } else {
                            // Si el valor no es un número válido, limpiar el otro campo
                            const otroCampoID = (id.startsWith('primera')) ? id.replace('primera', 'segunda') : id.replace('segunda', 'primera');
                            document.getElementById(otroCampoID).value = "";
                        }
                    }



                </script>
                <script>
                    function validarNumero(event, input) {
                        // Verifica si el carácter ingresado es un número entre 1 y 3
                        return (event.charCode >= 48 && event.charCode <= 51);
                    }




                </script>
            </form>



    </div>

    </main>






</body>

</html>
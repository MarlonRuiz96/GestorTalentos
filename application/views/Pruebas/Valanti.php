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
    <header class="text-center my-4">
        <h1 class="display-4">Prueba Valanti</h1>
    </header>
    <div class="container">
        <main>
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid mx-auto d-block mb-4" alt="Logo">

            <div class="d-flex justify-content-start">
                <p class="text-center"><br><br>
                    Por favor, marque <strong>cero, uno, dos o tres puntos</strong> en las casillas del centro, según la importancia que usted le da a cada frase en su vida personal.<br>
                    Las únicas opciones de respuesta son <strong>3-0, 0-3, 1-2 y 2-1</strong>. Siempre la suma de las casillas de los dos puntos debe ser <strong>3</strong>.<br><br>
                    <em>Ejemplo:</em><br>
                    Si marca <strong>3</strong> en la primera casilla, debe marcar <strong>0</strong> en la segunda casilla.<br>
                    Si marca <strong>2</strong> en la primera casilla, debe marcar <strong>1</strong> en la segunda casilla.
                </p>


            </div><br>
            <h4 style="text-align: center;">
                Por favor no abandone la prueba o quedará anulada..
            </h4>



            <form method="post" action="<?= site_url('DpiController/procesarValanti') ?>">
                <input type="hidden" name="DPI" value="<?= $Candidato->DPI ?>">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td class="text-right">Dedico tiempo a las personas que están alrededor mío</td>
                            <td>
                                <input type="number" min="0" max="3" id="primera_1" name="primera" placeholder=""
                                    onchange="autocompletar(this.id)" >

                                <input type="number" min="0" max="3" id="segunda_1" name="segunda" placeholder=""
                                    onchange="autocompletar(this.id)">

                            </td>
                            <td class="text-left">Actúo con perseverancia</td>
                        </tr>

                        <tr>
                            <td class="text-right">Soy tolerante</td>
                            <td>
                                <input type="number" min="0" max="3" id="primera_2" name="primera" placeholder=""
                                    onchange="autocompletar(this.id)">

                                <input type="number" min="0" max="3" id="segunda_2" name="segunda" placeholder=""
                                    onchange="autocompletar(this.id)">
                            </td>
                            <td class="text-left">Prefiero actuar con ética</td>
                        </tr>

                        <tr>
                            <td class="text-right">Al pensar, utilizo mi intuición o "sexto sentido"</td>
                            <td><input type="number" min="0" max="3" id="primera_3" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                                <input type="number" min="0" max="3" id="segunda_3" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)">
                            </td>
                            <td class="text-left">Me siento una persona digna</td>
                        </tr>
                        <tr>
                            <td class="text-right">Logro buena concentración mental</td>
                            <td><input type="number" min="0" max="3" id="primera_4" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_4" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Perdono todas las ofensas de cualquier persona</td>
                        </tr>
                        <tr>
                            <td class="text-right">Normalmente razono mucho</td>
                            <td><input type="number" min="0" max="3" id="primera_5" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_5" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Me destaco por el liderazgo en mis acciones</td>
                        </tr>
                        <tr>
                            <td class="text-right">Pienso con integridad</td>
                            <td><input type="number" min="0" max="3" id="primera_6" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_6" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Me coloco objetivos y metas en mi vida personal</td>
                        </tr>
                        <tr>
                            <td class="text-right">Soy una persona de iniciativa</td>
                            <td><input type="number" min="0" max="3" id="primera_7" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_7" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">En mi trabajo normalmente soy curioso</td>
                        </tr>

                        <tr>
                            <td class="text-right">Doy amor</td>
                            <td><input type="number" min="0" max="3" id="primera_8" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_8" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Para pensar hago síntesis de las distintas ideas</td>
                        </tr>
                        <tr>
                            <td class="text-right">Me siento en calma</td>
                            <td><input type="number" min="0" max="3" id="primera_9" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_9" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Pienso con veracidad</td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <span class="text-center">
                                    Por favor, marque cero, uno, dos o tres puntos en las casillas del centro para la
                                    frase
                                    más inaceptable, según su juicio. El puntaje más alto será para la frase que indique
                                    lo
                                    peor. Las únicas opciones de respuesta son: 3-0, 0-3, 2-1, 1-2. Siempre la suma de
                                    puntos de las dos casillas debe ser 3.
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Irrespetar la propiedad</td>
                            <td><input type="number" min="0" max="3" id="primera_10" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_10" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Sentir inquietud</td>
                        </tr>
                        <tr>
                            <td class="text-right">Ser irresponsable</td>
                            <td><input type="number" min="0" max="3" id="primera_11" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_11" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Ser desconsiderado hacia cualquier persona</td>
                        </tr>
                        <tr>
                            <td class="text-right">Caer en contradicciones al pensar</td>
                            <td><input type="number" min="0" max="3" id="primera_12" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_12" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Sentir intolerancia</td>
                        </tr>

                        <tr>
                            <td class="text-right">Ser violento</td>
                            <td><input type="number" min="0" max="3" id="primera_13" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_13" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Actuar con cobardía</td>
                        </tr>

                        <tr>
                            <td class="text-right">Sentirse presumido</td>
                            <td><input type="number" min="0" max="3" id="primera_14" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_14" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Generar divisiones y discordia entre los seres humanos</td>
                        </tr>

                        <tr>
                            <td class="text-right">Ser cruel</td>
                            <td><input type="number" min="0" max="3" id="primera_15" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_15" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Sentir ira</td>
                        </tr>

                        <tr>
                            <td class="text-right">Pensar con confusión</td>
                            <td><input type="number" min="0" max="3" id="primera_16" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_16" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Tener odio en el corazón</td>
                        </tr>

                        <tr>
                            <td class="text-right">Decir blasfemias</td>
                            <td><input type="number" min="0" max="3" id="primera_17" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_17" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Ser escandaloso</td>
                        </tr>

                        <tr>
                            <td class="text-right">Crear desigualdades entre los seres humanos</td>
                            <td><input type="number" min="0" max="3" id="primera_18" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_18" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Apasionarse por una idea</td>
                        </tr>

                        <tr>
                            <td class="text-right">Sentirse inconstante</td>
                            <td><input type="number" min="0" max="3" id="primera_19" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_19" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Crear rivalidad hacia otros</td>
                        </tr>

                        <tr>
                            <td class="text-right">Pensamientos irracionales</td>
                            <td><input type="number" min="0" max="3" id="primera_20" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_20" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Traicionar a un desconocido</td>
                        </tr>


                        <tr>
                            <td class="text-right">Ostentar las riquezas materiales</td>
                            <td><input type="number" min="0" max="3" id="primera_21" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_21" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Sentirse infeliz</td>
                        </tr>

                        <tr>
                            <td class="text-right">Entorpecer la cooperación entre los seres humanos</td>
                            <td><input type="number" min="0" max="3" id="primera_22" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_22" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">La maldad</td>
                        </tr>

                        <tr>
                            <td class="text-right">Odiar a cualquier ser de la naturaleza</td>
                            <td><input type="number" min="0" max="3" id="primera_23" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_23" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Hacer distinciones entre las personas</td>
                        </tr>
                        <tr>
                            <td class="text-right">Sentirse intranquilo</td>
                            <td><input type="number" min="0" max="3" id="primera_24" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_24" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Ser infiel</td>
                        </tr>

                        <tr>
                            <td class="text-right">Tener la mente dispersa</td>
                            <td><input type="number" min="0" max="3" id="primera_25" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_25" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Mostrar apatía al pensar</td>
                        </tr>

                        <tr>
                            <td class="text-right">La injusticia</td>
                            <td><input type="number" min="0" max="3" id="primera_26" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_26" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Sentirse angustiado</td>
                        </tr>

                        <tr>
                            <td class="text-right">Vengarse de los que odian a todo el mundo</td>
                            <td><input type="number" min="0" max="3" id="primera_27" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_27" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Vengarse del que hace daño a un familiar</td>
                        </tr>

                        <tr>
                            <td class="text-right">Usar abusivamente el poder</td>
                            <td><input type="number" min="0" max="3" id="primera_28" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_28" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Distraerse</td>
                        </tr>

                        <tr>
                            <td class="text-right">Ser desagradecido con los que ayudan</td>
                            <td><input type="number" min="0" max="3" id="primera_29" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_29" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Ser egoísta con todos</td>
                        </tr>

                        <tr>
                            <td class="text-right">Cualquier forma de irrespeto</td>
                            <td><input type="number" min="0" max="3" id="primera_30" name="terceraA" placeholder=""
                                    onchange="autocompletar(this.id)">
                            <input type="number" min="0" max="3" id="segunda_30" name="terceraB" placeholder=""
                                    onchange="autocompletar(this.id)"></td>
                            <td class="text-left">Odiar</td>
                        </tr>



                    </table>
                </div>


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
                        const otroCampoID = (id.startsWith('primera')) ? id.replace('primera', 'segunda') : id.replace(
                            'segunda', 'primera');
                        document.getElementById(otroCampoID).value = "";
                    }
                }
                </script>

            </form>

        </main>


    </div>







</body>

</html>
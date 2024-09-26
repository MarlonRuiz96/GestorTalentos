<?php require_once APPPATH . 'views/Dashboard/partesuperior.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">
    <title>Prueba Psicometrica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


</head>

<body>
    <header>
        <h1 class="text-center">Candidato</h1>
    </header>

    <div class="container">

        <main>
            <a href="<?= site_url('PdfController/facturaPdf/' . $candidato_data->idCandidato); ?>"
                id="generateReportLink" class="btn btn-success sweetalert-linkReporte" data-title="Generar Reporte"
                style="float: right;">Generar Reporte</a>


            <h2 class="text">
                Datos del Candidato

            </h2>

            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombres</label>
                        <input type="text" class="form-control" id="nombres"
                            value="<?php echo $candidato_data->Nombres; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Puesto</label>
                        <input type="text" class="form-control" id="Puesto"
                            value="<?php echo $candidato_data->Puesto; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contacto</label>
                        <input type="text" class="form-control" id="Contacto"
                            value="<?php echo $candidato_data->Contacto; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Correo</label>
                        <input type="text" class="form-control" id="Correo"
                            value="<?php echo $candidato_data->Correo; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">DPI</label>
                        <input type="text" class="form-control" id="Correo" value="<?php echo $candidato_data->DPI; ?>"
                            readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Anotaciones</label>
                        <form id="editForm" action="<?php echo site_url('CandidatoController/guardarNotas'); ?>"
                            method="POST">
                            <div class="anotaciones-container">
                                <textarea class="form-control" id="Anotaciones" name="notas"
                                    style="width: 100%;"><?php echo $candidato_data->notas; ?></textarea>
                                <button class="btn btn-primary sweetalert-guardadsr" id="GuardarAnotaciones"
                                    style="margin-left: 10px;">Guardar</button>
                            </div>
                        </form>
                    </div>


                </div>
            </form>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <li class="page-item">
                        <a class="page-link" href="#">Temperamentos</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Myers-Briggs</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Valanti</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">16 PF</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            Cleaver
                        </a>
                    </li>

                </ul>
            </nav>



            <!-- PREUBA TEMPERAMENTOS-->
            <div class="contenido div-ocultar">
                <main>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 style="margin-right: 400px;">Temperamento</h3>
                        <div>
                            <?php if (!($candidato_data->temperamento)): ?>
                            <a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/temperamento'); ?>"
                                class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                Prueba</a>
                            <?php else: ?>
                            <a href="#" class="btn btn-success disabled"
                                style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
                            <?php endif; ?>

                            <?php if ($candidato_data->temperamento): ?>

                            <a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/temperamento'); ?>"
                                class="btn btn-danger sweetalert-desactivar"
                                data-title="¿Desactivar la Prueba">Desactivar
                                Prueba</a>
                            <?php else: ?>
                            <a href="#" class="btn btn-danger disabled"
                                style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
                            <?php endif; ?>

                            <a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/temperamento'); ?>"
                                class="btn btn-warning sweetalert-reiniciar"
                                data-title="Estas a punto de reiniciar los datos, la prueba sera desactivada, tendrás que activarla nuevamente.">
                                Reiniciar datos
                            </a>

                        </div>


                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> <br>
                                    <?php echo $textoFortaleza['texto'];
                                    ?><br>
                                    FORTALEZAS
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Las emociones del
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?>
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> en el trabajo
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['emociones'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['trabajo'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                        <thead>
                            <tr>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como padre.
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como amigo.
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['familia'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['amigo'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    <!-- Repite la estructura para otras personalidades -->
                    <br><br>

                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> <br>
                                    <?php echo $textoFortaleza['texto'];
                                    ?><br>
                                    DEBILIDADES
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Las emociones del
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?>
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> en el trabajo
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['emocionesD'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['trabajoD'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                        <thead>
                            <tr>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como padre.
                                </th>
                                <th>El
                                    <?php echo $textoFortaleza['temperamento'];
                                    ?> como amigo.
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $textoFortaleza['familiaD'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $textoFortaleza['amigoD'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>

                    </table>
            </div>

            <!--PRUEBA MYERS BRIGGS-->
            <div class="contenido div-ocultar-2">
                <main>

                    <div class="d-flex justify-content-between align-items-center">
                        <h2 style="margin-right: 400px;">Myers-Briggs</h2>
						<div>
							<?php if (!($candidato_data->Briggs)): ?>
								<a href="<?= site_url('CandidatoController/activarPruebas/' . $candidato_data->DPI . '/Briggs'); ?>"
								   class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
									Prueba</a>
							<?php else: ?>
								<a href="#" class="btn btn-success disabled"
								   style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
							<?php endif; ?>

							<?php if ($candidato_data->Briggs): ?>

								<a href="<?= site_url('CandidatoController/desactivarPruebas/' . $candidato_data->DPI . '/Briggs'); ?>"
								   class="btn btn-danger sweetalert-desactivar"
								   data-title="¿Desactivar la Prueba">Desactivar
									Prueba</a>
							<?php else: ?>
								<a href="#" class="btn btn-danger disabled"
								   style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
							<?php endif; ?>

							<a href="<?= site_url('CandidatoController/reiniciarDatos/' . $candidato_data->DPI . '/Briggs'); ?>"
							   class="btn btn-warning sweetalert-reiniciar"
							   data-title="Estas a punto de reiniciar los datos, la prueba sera desactivada, tendrás que activarla nuevamente.">
								Reiniciar datos
							</a>

						</div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <!-- Columna 1: Gráfico -->
                            <canvas id="myCharts" width="50" height="20"></canvas>

                            <!-- Columna 2: Espacio para anotaciones -->


                        </div>

                        <div class="Extrovertido">
                            <h2>Extrovertido</h2>
                            <p>
                                Remite al adjetivo extravertido, al que define como “dado a la extraversión”. Y a su
                                vez, considera a la extraversión como la inclinación de la persona hacia el mundo
                                exterior, propia de quienes tienen un carácter abierto, gracias a lo cual les resulta
                                fácil vincularse con los demás. Si bien ambos términos están admitidos, se considera más
                                adecuado extravertido; se cree que extrovertido surge por influencia de su antónimo,
                                introvertido.
                            </p>
                        </div>
                        <div class="Introvertido">
                            <h2>Introvertido</h2>
                            <p>
                                Está preocupado por el mundo interior, de la mente, disfrutan pensar, explorar sus
                                pensamientos y emociones. La introversión es una actitud típica que se caracteriza por
                                la concentración del interés en los procesos internos del sujeto. Tienden a ser
                                sumamente introspectivos.
                            </p>
                        </div>
                        <div class="Sensorial">
                            <h2>Sensorial</h2>
                            <p>
                                Los sentidos son las distintas capacidades de un ser vivo para, apelando a ciertos
                                órganos, lograr la percepción de estímulos internos o externos. El ser humano tiene
                                cinco sentidos primordiales: el olfato, el tacto, el oído, el gusto y la vista. La
                                sensibilidad, asimismo, es la facultad que permite sentir (experimentar una sensación).
                            </p>
                        </div>

                        <div class="Intuitivo">
                            <h2>Intuitivo</h2>
                            <p>
                                Persona que tiene la facultad de comprender las cosas al instante, sin necesidad de
                                realizar complejos razonamiento. El término también se utiliza para hacer referencia al
                                resultado de intuir. Se utiliza como sinónimo de presentimiento (tener la sensación de
                                que algo va a ocurrir o adivinar algo antes de que suceda)
                            </p>
                        </div>

                        <div class="Racional">
                            <h2>Racional</h2>
                            <p>
                                Persona que emplea la razón y tiene la facultad de discutir el motivo o causa, el
                                argumento que se esgrime para apoyar algo, o el cociente intelectual que en ocasiones no
                                necesita ser alto para mostrar su capacidad de razonamiento, son personas que se guían
                                por las objetividades y no son aptas para aceptar cualquier teoría que no haya ninguna
                                prueba.
                            </p>
                        </div>

                        <div class="Emocional">
                            <h2>Emocional</h2>
                            <p>
                                Se clasifica como emocional a una persona o situación en la cual diferentes tipos de
                                sentimientos están visibles y a flor de piel. Es importante entender que una emoción es
                                un fenómeno tanto físico como psíquico y que, por tanto, tales eventos no son siempre
                                manejables y medibles de manera voluntaria por los individuos, derivando en
                                personalidades en las cuales el sector emocional ejerce mayor influencia o poder sobre
                                el sector racional del comportamiento.
                            </p>
                        </div>

                        <div class="Calificador">
                            <h2>Calificador</h2>
                            <p>
                                Personalidad que emplea distintos criterios para calificar a las personas, situaciones y
                                objetos que se proponga a distinguir. Tiende a enumerar y clasificar varios eventos
                                conforme lo establece su ideología y muy pocas veces comparte la opinión de los demás
                                dando a entender que su opinión es la verdadera porque lo ha entendido en varias formas.
                            </p>
                        </div>

                        <div class="Perceptivo">
                            <h2>Perceptivo</h2>
                            <p>
                                Personalidad que interpreta y entiende mejor la información que recibe a través de la
                                experiencia (probar, ver, saborear, etc.). y entiende que las cosas tienen un
                                significado de manera inteligente. No es necesario que la persona obtenga una formación
                                académica adecuada; porque, se basa en su método empírico.
                            </p>
                        </div>


                    </div>
                </main>
                <br>
            </div>
            <!-- PRUEBA VALANTI-->
            <div class="contenido div-ocultar-3">
                <main>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 style="margin-right: 500px;">Perfil valoral, cuestionario Valanti</h2>
                            <div>
                                <a href="<?= site_url('CandidatoController/activarValanti/' . $candidato_data->DPI); ?>"
                                    class="btn btn-success sweetalert-briggs"
                                    data-title="¿Activar la prueba Valanti? ">Activar</a>
                                <a href="<?= site_url('CandidatoController/desactivarValanti/' . $candidato_data->DPI); ?>"
                                    class="btn btn-danger sweetalert-briggs2"
                                    data-title="¿Desactivar la prueba Valanti?">Desactivar</a>
                            </div>


                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <!-- Columna 1: Gráfico -->
                            <div class="col-md-6">
                                <canvas id="radiaGlChart"></canvas>
                            </div>
                            <!-- Columna 2: Espacio para anotaciones -->

                            <div class="col-md-6">
                                <div class="row">
                                    <!-- Formulario 1 -->
                                    <div class="col-md-6">
                                        <form id="datosForm">

                                            <h2>Participante:</h2>
                                            <div class="form-group">
                                                <label for="rectitud">Verdad:</label>
                                                <input type="text" class="form-control" id="Verdad" name="Verdad"
                                                    value="<?php echo isset($dataValanti->Verdad) ? $dataValanti->Verdad : ''; ?>">


                                            </div>
                                            <div class="form-group">
                                                <label for="rectitud">Rectitud:</label>
                                                <input type="text" class="form-control" id="Rectitud" name="Rectitud"
                                                    value="<?php echo isset($dataValanti->Rectitud) ? $dataValanti->Rectitud : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="paz">Paz:</label>
                                                <input type="text" class="form-control" id="Paz" name="Paz"
                                                    value="<?php echo isset($dataValanti->Paz) ? $dataValanti->Paz : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="amor">Amor:</label>
                                                <input type="text" class="form-control" id="Amor" name="Amor"
                                                    value="<?php echo isset($dataValanti->Amor) ? $dataValanti->Amor : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="noViolencia">No Violencia:</label>
                                                <input type="text" class="form-control" id="NoViolencia"
                                                    name="NoViolencia"
                                                    value="<?php echo isset($dataValanti->No_violencia) ? $dataValanti->No_violencia : ''; ?>">

                                            </div>


                                        </form>

                                    </div>

                                    <!-- Formulario 2 DEL GESTOR DE TALENTOS -->
                                    <div class="col-md-6">
                                        <form id="datosFormNuevo"
                                            action="<?php echo site_url('CandidatoController/guardarValanti'); ?>"
                                            method="POST">
                                            <input type="hidden" class="form-control" id="DPI" name="DPI"
                                                value="<?php echo $candidato_data->DPI; ?>">

                                            <h2> Gestor:</h2>
                                            <div class="form-group">
                                                <label for="Verdad">Verdad:</label>
                                                <input type="number" class="form-control" id="Verdad" name="Verdad"
                                                    value="<?php echo isset($dataValanti->verdadEmpresa) ? $dataValanti->verdadEmpresa : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="Rectitud">Rectitud:</label>
                                                <input type="number" class="form-control" id="Rectitud" name="Rectitud"
                                                    value="<?php echo isset($dataValanti->rectitudEmpresa) ? $dataValanti->rectitudEmpresa : ''; ?>">

                                            </div>

                                            <div class="form-group">
                                                <label for="Paz">Paz:</label>
                                                <input type="number" class="form-control" id="Paz" name="Paz"
                                                    value="<?php echo isset($dataValanti->pazEmpresa) ? $dataValanti->pazEmpresa : ''; ?>">

                                            </div>


                                            <div class="form-group">
                                                <label for="Amor">Amor:</label>
                                                <input type="number" class="form-control" id="Amor" name="Amor"
                                                    value="<?php echo isset($dataValanti->amorEmpresa) ? $dataValanti->amorEmpresa : ''; ?>">

                                            </div>
                                            <div class="form-group">
                                                <label for="NoViolencia">No Violencia:</label>
                                                <input type="number" class="form-control" id="NoViolencia"
                                                    name="NoViolencia"
                                                    value="<?php echo isset($dataValanti->noViolenciaEmpresa) ? $dataValanti->noViolenciaEmpresa : ''; ?>">

                                            </div>
                                            <!-- Botón de guardar -->
                                            <button type="submit" class="btn btn-primary mt-3"
                                                id="GuardarDatosNuevo">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </main>

            </div>
            <!-- CODIGO PARA LA PRUEBA 16PF -->
            <div class="contenido div-ocultar-4">
                <main>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 style="margin-right: 500px;">Cuestionario 16 P.F</h3>
                        <div>
                            <a href="<?= site_url('CandidatoController/activarpf/' . $candidato_data->DPI); ?>"
                                class="btn btn-success sweetalert-briggs"
                                data-title="¿Activar la prueba 16 P.F?">Activar</a>
                            <a href="<?= site_url('CandidatoController/desactivarpf/' . $candidato_data->DPI); ?>"
                                class="btn btn-danger sweetalert-briggs2"
                                data-title="¿Desactivar la prueba 16 P.F?">Desactivar</a>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start;">
                        <div>
                            <table id="combinedTable">
                                <tbody>
                                    <tr>
                                        <td class="title">RESERVADO. No se relaciona con facilidad hacia las demás
                                            personas
                                        </td>
                                        <td class="chart"><canvas id="graficaReservado"></canvas></td>
                                        <td class="description">SOCIABLE. Fácil de tratar, cooperador y muy
                                            adaptable
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title">LENTO. Despacioso en sus actos. Demorado para aprender
                                        </td>
                                        <td class="chart"><canvas id="graficaLento"></canvas></td>
                                        <td class="description">RÁPIDO. Percibe y comprende con velocidad</td>
                                    </tr>
                                    <tr>
                                        <td class="title">INFANTIL. Curioso, cambiante y toma las decisiones con
                                            inmadurez
                                        </td>
                                        <td class="chart"><canvas id="graficaInfantil"></canvas></td>
                                        <td class="description">ADULTO. Persona madura. Toma las decisiones naturalmente
                                            sin apuros</td>
                                    </tr>
                                    <tr>
                                        <td class="title">SUMISO. Tiende a depender de otras personas y carece de
                                            opinión
                                        </td>
                                        <td class="chart"><canvas id="graficaSumiso"></canvas></td>
                                        <td class="description">DOMINANTE. Una persona que demanda mucho de forma
                                            autoritaria</td>
                                    </tr>
                                    <tr>
                                        <td class="title">TACITURNO. Introspectivo, melancólico, lánguido y sin consuelo
                                        </td>
                                        <td class="chart"><canvas id="graficaTaciturno"></canvas></td>
                                        <td class="description">ENTUSIASTA. Alegre, franco y enérgico. Tiene empuje e
                                            iniciativa</td>
                                    </tr>
                                    <tr>
                                        <td class="title">VARIABLE. Tendencia a ser inconstante, sin decisiones fijas
                                        </td>
                                        <td class="chart"><canvas id="graficaVariable"></canvas></td>
                                        <td class="description">CONSTANTE. Responsable, decidido, bien organizado</td>
                                    </tr>
                                    <tr>
                                        <td class="title">TIMIDO. Cauteloso, capacidad de contacto social baja
                                        </td>
                                        <td class="chart"><canvas id="graficaTimido"></canvas></td>
                                        <td class="description">AVENTURADO. Sociable, dinámico, arriesgado, comprometido
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title">EMOCIONAL. Imaginativo, soñador, con ilusiones e impetuoso
                                        </td>
                                        <td class="chart"><canvas id="graficaEmocional"></canvas></td>
                                        <td class="description">RACIONAL. Práctico, lógico con fundamentos teóricos y
                                            experiencia</td>
                                    </tr>
                                    <tr>
                                        <td class="title">SOSPECHOSO. Interesado en sí mismo. No siempre es bueno para
                                            trabajar en grupo

                                        </td>
                                        <td class="chart"><canvas id="graficaSospechoso"></canvas></td>
                                        <td class="description">CONFIABLE. Tendencia a estar libre de celos, es bueno
                                            para trabajar en grupo.</td>
                                    </tr>
                                    <tr>
                                        <td class="title">EXCÉNTRICO. Curioso, humorístico, raro, paradójico
                                        </td>
                                        <td class="chart"><canvas id="graficaExcentrico"></canvas></td>
                                        <td class="description">CONVENCIONAL. Aceptado, normal, obligado, acomedido</td>
                                    </tr>
                                    <tr>
                                        <td class="title">SIMPLE. Sencillo, se satisface fácilmente y sin complicaciones
                                        </td>
                                        <td class="chart"><canvas id="graficaSimple"></canvas></td>
                                        <td class="description">ESTRUCTURADO. Cuidadoso, experimentado, analítico y
                                            sofisticado</td>
                                    </tr>
                                    <tr>
                                        <td class="title">INSEGURO. Incierto, presenta sentimientos de inseguridad
                                        </td>
                                        <td class="chart"><canvas id="graficaInseguro"></canvas></td>
                                        <td class="description">SEGURO DE SÍ MISMO. Confiado en lo que hace y piensa
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title">RUTINARIO. Tradicional, conservador y moderado
                                        </td>
                                        <td class="chart"><canvas id="graficaRutinario"></canvas></td>
                                        <td class="description">INNOVADOR. Le gustan las ideas nuevas</td>
                                    </tr>
                                    <tr>
                                        <td class="title">DEPENDIENTE. No le gusta tomar decisiones sin contar con la
                                            aprobación de los demás

                                        </td>
                                        <td class="chart"><canvas id="graficaDependiente"></canvas></td>
                                        <td class="description">AUTOSUFICIENTE. Actúa por sí mismo, independiente y toma
                                            sus propias decisiones sean o no correctas</td>
                                    </tr>
                                    <tr>
                                        <td class="title">DESCONTROLADO. Poco cuidadoso, desordenado y excesivo en
                                            emociones
                                        </td>
                                        <td class="chart"><canvas id="graficaDescontrolado"></canvas></td>
                                        <td class="description">CONTROLADO. Domina sus emociones, cuidadoso y tranquilo
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title">TENSO. Excitable, impaciente, rígido, se desespera y desespera
                                            a los demás
                                        </td>
                                        <td class="chart"><canvas id="graficaTenso"></canvas></td>
                                        <td class="description">ESTABLE. Seguro y libre de tensiones emocionales. Firme
                                            en decisiones</td>
                                    </tr>
                                    <!-- Agrega más filas según sea necesario -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
            <!-- FORMULARIO CLEAVER-->
            <div class="div-ocultar-5 contenido">
                <main>
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 style="margin-right: 500px;">Cleaver</h3>
                        <div>
                            <?php if (!($candidato_data->cleaver)): ?>
                            <a href="<?= site_url('CandidatoController/activarCleaver/' . $candidato_data->DPI); ?>"
                                class="btn btn-success sweetalert-activar" data-title="¿Activar la prueba?">Activar
                                Prueba</a>
                            <?php else: ?>
                            <a href="#" class="btn btn-success disabled"
                                style="pointer-events: none; opacity: 0.5;">Prueba activada</a>
                            <?php endif; ?>

                            <?php if ($candidato_data->cleaver): ?>

                            <a href="<?= site_url('CandidatoController/deactivarCleaver/' . $candidato_data->DPI); ?>"
                                class="btn btn-danger sweetalert-desactivar"
                                data-title="¿Desactivar la Prueba">Desactivar
                                Prueba</a>
                            <?php else: ?>
                            <a href="#" class="btn btn-danger disabled"
                                style="pointer-events: none; opacity: 0.5;">Prueba desactivada</a>
                            <?php endif; ?>

                            <a href="<?= site_url('CandidatoController/reiniciarCleaver/' . $candidato_data->DPI); ?>"
                                class="btn btn-warning sweetalert-reiniciar"
                                data-title="Estas a punto de reiniciar los datos, la prueba sera desactivada, tendrás que activarla nuevamente.">Reiniciar
                                datos</a>
                        </div>


                    </div>
                    <div>
                        <h2>Normal</h2>
                        <div class="flex-container">
                            <div class="chart-container">
                                <canvas id="normalChart"></canvas>
                            </div>
                            <div class="info-container">
                                <?php echo $maxCleaver['maxM']['interpretacionM']; ?>

                            </div>
                        </div>

                        <h2>Motivación</h2>
                        <div class="flex-container">
                            <div class="chart-container">
                                <canvas id="motivacionChart"></canvas>
                            </div>
                            <div class="info-container">
                                <?php echo $maxCleaver['maxL']['interpretacionL']; ?>

                            </div>
                        </div>

                        <h2>Presión</h2>
                        <div class="flex-container">
                            <div class="chart-container">
                                <canvas id="presionChart"></canvas>
                            </div>
                            <div class="info-container">
                                <?php echo $maxCleaver['maxT']['interpretacionT']; ?>

                            </div>
                        </div>
                </main>

            </div>



    </div>



    </main>
    </div>
    </main>

    <!-- APARTADO PARA OCULTAR LOS DIVS-->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // Funciones para ocultar y mostrar divs
        const toggleDivs = {
            ocultar: (clases) => {
                clases.forEach(clase => {
                    document.querySelectorAll(`.${clase}`).forEach(div => {
                        div.style.display = 'none';
                    });
                });
            },
            mostrar: (clase) => {
                document.querySelectorAll(`.${clase}`).forEach(div => {
                    div.style.display = 'block';
                });
            }
        };

        // Manejo de la paginación para mostrar y ocultar divs
        const linksPaginacion = document.querySelectorAll('.pagination .page-link');
        const divClasses = ['div-ocultar', 'div-ocultar-2', 'div-ocultar-3', 'div-ocultar-4', 'div-ocultar-5'];

        linksPaginacion.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                toggleDivs.ocultar(divClasses);
                toggleDivs.mostrar(divClasses[index]);
            });
        });

        // Mostrar el primer div por defecto al cargar la página
        toggleDivs.mostrar(divClasses[0]);

        // Función general para manejar SweetAlert2
        const handleSweetAlert = (selector, options) => {
            const links = document.querySelectorAll(selector);
            links.forEach(link => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    const targetUrl = link.getAttribute('href');
                    const title = link.getAttribute('data-title');

                    Swal.fire({
                        title: title,
                        text: options.text,
                        icon: options.icon,
                        showCancelButton: true,
                        confirmButtonColor: options.confirmButtonColor,
                        cancelButtonColor: options.cancelButtonColor,
                        confirmButtonText: options.confirmButtonText,
                        cancelButtonText: options.cancelButtonText
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: options.successTitle,
                                text: options.successText,
                                icon: 'success',
                                confirmButtonColor: '#3085d6'
                            }).then(() => {
                                window.location.href = targetUrl;
                            });
                        }
                    });
                });
            });
        };

        // Configuración para diferentes tipos de SweetAlert2
        const sweetAlertConfigs = [{
                selector: '.sweetalert-guardar',
                options: {
                    text: '¿Estás seguro?',
                    icon: 'warning',
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, Guardar',
                    cancelButtonText: 'Cancelar',
                    successTitle: 'Observaciones',
                    successText: 'Observaciones guardadas con éxito.'
                }
            },
            {
                selector: '.sweetalert-activar',
                options: {
                    text: '¿Estás seguro?',
                    icon: 'warning',
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, activar.',
                    cancelButtonText: 'Cancelar',
                    successTitle: 'Prueba activada.',
                    successText: 'La prueba fue activada con éxito.'
                }
            },
            {
                selector: '.sweetalert-desactivar',
                options: {
                    text: '¿Estás seguro?',
                    icon: 'warning',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, Desactivar',
                    cancelButtonText: 'Cancelar',
                    successTitle: 'Prueba desactivada.',
                    successText: 'La prueba fue desactivada con éxito.'
                }
            },
            {
                selector: '.sweetalert-reiniciar',
                options: {
                    text: '¿Estás seguro?',
                    icon: 'warning',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, Reiniciar datos',
                    cancelButtonText: 'Cancelar',
                    successTitle: 'Accion realizada con éxito.',
                    successText: 'Los datos de la prueba fueron reiniciados con éxito.'
                }
            }
        ];

        // Aplicar las configuraciones de SweetAlert2
        sweetAlertConfigs.forEach(config => handleSweetAlert(config.selector, config.options));

        // Optimizar la ocultación de múltiples divs al final del documento
        document.querySelectorAll('.div-ocultar-2, .div-ocultar-3, .div-ocultar-4, .div-ocultar-5').forEach(
            div => {
                div.style.display = 'none';
            });
    });
    </script>

    <!-- Librerías necesarias -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Gráficas -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // Datos provenientes del servidor
        const cleaver = <?php echo json_encode($dataCleaver); ?>;
        const data16 = <?php echo json_encode($data16pf); ?>;
        const dataValanti = <?php echo json_encode($dataValanti); ?>;
        const candidato = <?php echo json_encode($candidato_data); ?>;
        const dataTemperamento = <?php echo json_encode($dataTemperamento); ?>;
        const dataBriggs = <?php echo json_encode($dataBriggs); ?>;

        // Configuración común para todos los gráficos de línea
        const commonLineOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        stepSize: 5,
                        callback: (value) => value
                    }
                },
                x: {
                    ticks: {
                        autoSkip: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                },
                datalabels: {
                    display: false
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            },
            elements: {
                line: {
                    tension: 0
                }
            }
        };

        // Función para crear gráficos de línea
        const createLineChart = (ctx, label, data, color) => {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['D', 'I', 'S', 'C'],
                    datasets: [{
                        label: label,
                        data: data,
                        borderColor: color,
                        borderWidth: 1,
                        pointBackgroundColor: color,
                        pointBorderColor: color,
                        fill: false
                    }]
                },
                options: commonLineOptions
            });
        };

        // Crear gráficos de línea
        createLineChart(document.getElementById('normalChart').getContext('2d'), 'NORMAL', [cleaver.T1, cleaver
            .T2, cleaver.T3, cleaver.T4
        ], 'blue');
        createLineChart(document.getElementById('motivacionChart').getContext('2d'), 'MOTIVACION', [cleaver.M1,
            cleaver.M2, cleaver.M3, cleaver.M4
        ], 'green');
        createLineChart(document.getElementById('presionChart').getContext('2d'), 'PRESION', [cleaver.L1,
            cleaver.L2, cleaver.L3, cleaver.L4
        ], 'red');

        // Función para crear gráficos de barra
        const createBarChart = (ctx, data) => {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [''], // Etiqueta vacía
                    datasets: [{
                        label: '',
                        data: [data],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            display: false
                        },
                        x: {
                            beginAtZero: true,
                            max: 6
                        }
                    }
                }
            });
        };

        // Crear múltiples gráficos de barra
        const barChartIds = [
            'graficaReservado', 'graficaLento', 'graficaInfantil', 'graficaSumiso',
            'graficaTaciturno', 'graficaVariable', 'graficaTimido', 'graficaEmocional',
            'graficaSospechoso', 'graficaExcentrico', 'graficaSimple', 'graficaInseguro',
            'graficaRutinario', 'graficaDependiente', 'graficaDescontrolado', 'graficaTenso'
        ];

        barChartIds.forEach((id, index) => {
            const ctx = document.getElementById(id).getContext('2d');
            const dataKey = `p${index + 1}`; // Asumiendo que data16 tiene p1, p2, ..., p16
            createBarChart(ctx, data16[dataKey]);
        });

        // Gráfico Radar
        const radarCtx = document.getElementById("radiaGlChart").getContext("2d");
        new Chart(radarCtx, {
            type: "radar",
            data: {
                labels: ["Verdad", "Rectitud", "Paz", "Amor", "No_Violencia"],
                datasets: [{
                        label: candidato.Nombres,
                        data: [
                            dataValanti.Verdad,
                            dataValanti.Rectitud,
                            dataValanti.Paz,
                            dataValanti.Amor,
                            dataValanti.No_violencia
                        ],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 3
                    },
                    {
                        label: 'Gestor de Talentos',
                        data: [
                            dataValanti.verdadEmpresa,
                            dataValanti.rectitudEmpresa,
                            dataValanti.pazEmpresa,
                            dataValanti.amorEmpresa,
                            dataValanti.noViolenciaEmpresa
                        ],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 3
                    }
                ]
            },
            options: {
                responsive: true,
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
                scales: {
                    r: {
                        angleLines: {
                            display: false
                        },
                        suggestedMin: 0,
                        suggestedMax: 70
                    }
                },
                tooltips: {
                    callbacks: {
                        label: (tooltipItem, data) => {
                            const dataset = data.datasets[tooltipItem.datasetIndex];
                            const label = dataset.label || '';
                            return `${label}: ${tooltipItem.raw}`;
                        }
                    }
                }
            }
        });

        // Gráfico Doughnut para Temperamentos
        const doughnutCtx = document.getElementById('myChart').getContext('2d');
        new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Melancólico', 'Flemático', 'Colérico', 'Sanguíneo'],
                datasets: [{
                    label: 'Temperamentos',
                    data: [
                        dataTemperamento.melancolico,
                        dataTemperamento.flematico,
                        dataTemperamento.colerico,
                        dataTemperamento.sanguineo
                    ],
                    backgroundColor: [
                        'rgb(23, 162, 184)',
                        'rgb(40, 167, 69)',
                        'rgb(220, 53, 69)',
                        'rgb(255, 193, 7)'
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

        // Guardar gráfica como imagen
        document.getElementById('saveChartButton').addEventListener('click', () => {
            html2canvas(document.getElementById('myChart')).then(canvas => {
                const link = document.createElement('a');
                link.download = 'grafico_temperamentos.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        });

        // Gráfico BRIGGS
        const briggsCtx = document.getElementById("myCharts").getContext("2d");
        new Chart(briggsCtx, {
            type: "bar",
            data: {
                labels: ["Extrovertido", "Introvertido", "Sensorial", "Intuitivo", "Racional",
                    "Emocional", "Calificador", "Perceptivo"
                ],
                datasets: [{
                    label: "Resultados de la prueba BRIGGS",
                    data: [
                        dataBriggs.extrovertido,
                        dataBriggs.introvertido,
                        dataBriggs.sensorial,
                        dataBriggs.intuitivo,
                        dataBriggs.racional,
                        dataBriggs.emocional,
                        dataBriggs.calificador,
                        dataBriggs.perceptivo
                    ],
                    backgroundColor: ["#1d864a", "#fcc832", "#347fab", "#ff5733", "#8e44ad",
                        "#3498db", "#f39c12", "#27ae60"
                    ]
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Datos de la personalidad"
                    }
                }
            }
        });

        // Función para capturar y enviar la imagen
        const captureAndSendImage = (event) => {
            event.preventDefault();

            const chartImage = document.getElementById('chartImage');
            chartImage.src = document.getElementById('myChart').toDataURL();

            chartImage.onload = () => {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= site_url('PdfController/uploadImage'); ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById('imagePathInput').value = xhr.responseText;
                        window.location.href =
                            `${document.getElementById('generateReportLink').href}?imagePath=${encodeURIComponent(xhr.responseText)}`;
                    }
                };
                xhr.send(`image=${encodeURIComponent(chartImage.src)}`);
            };
        };

        // Agregar el evento al enlace para generar el reporte
        document.getElementById('generateReportLink').addEventListener('click', captureAndSendImage);

        // Loguear los datos del candidato
        const candidatoData = <?= json_encode($candidato_data) ?>;
        console.log(candidatoData);
    });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/consulta.css'); ?>">

    <title>Prueba de Briggs</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin-2.min.css'); ?>">
</head>

<body>
    <header>
        <h1>Prueba de Myers-Briggss</h1>
    </header>
    <div class="container">
        <main>
        <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid mb-4" alt="Logo">

            <div class="d-flex justify-content-start">
                <p class="text-center"><br><br>Seleccione las opciones que reflejen algún aspecto de su
                    personalidad o se identifiquen con parámetros de acción ante las diferentes situaciones que se plantean. 
                    Si no se relacionan con su forma de ser o pensar, déjelas en blanco.
                </p>
            </div><br>
            <h5 style="text-align: center;">
                Por favor no abandone la prueba o quedará anulada.
            </h5>
            <p class="text-center"><br><br><strong>¡Buena suerte!</strong></p>

            <br><br>

            <form method="post" action="<?= site_url('DpiController/procesarRespuestas') ?>">
                <input type="hidden" name="DPI" value="<?= $Candidato->DPI ?>">

                <div class="mb-3">
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta1" value="x">
                            <span class="form-check-label">1. Tiendo hablar primero, pensar después y no sé qué decir
                                hasta que me escucho y digo: "Aprenderé a tener mi boca cerrada por una sola vez"</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta2" value="x">
                            <span class="form-check-label">2.Conozco a mucha gente y la mayoría la considero como amigos
                                íntimos. Me gusta incluir a tantas personas que me sea posible en mis
                                actividades."</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta3" value="x">
                            <span class="form-check-label">3. No me importa leer o mantener una conversación mientras se
                                desarrolla otra actividad (ver televisión, escuchar radio, y ver mis redes sociales). En
                                realidad, puedo permanecer indiferente a esa distracción…… x</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta4" value="x">
                            <span class="form-check-label">4. Me gusta ir a reuniones y manifiesto mi opinión; pero, me
                                siento frustrado si no me dan oportunidad de expresar mi punto de vista</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta5" value="x">
                            <span class="form-check-label">5. Prefiero generar ideas en grupo que por mi cuenta, me
                                siento agotado si paso mucho tiempo reflexionando sin tener la oportunidad de
                                intercambiar mis ideas con otras personas</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta6" value="x">
                            <span class="form-check-label">6. Disfruto de la paz y la tranquilidad de tener tiempo para
                                conmigo mismo. Hago mi tiempo privado y lo encuentro fácilmente invadido y tiendo
                                adaptarme desarrollando un alto poder de concentración que me permite aislarme de las
                                conversaciones cercanas, teléfonos sonando y otros similares.</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta7" value="x">
                            <span class="form-check-label">7. A veces me han calificado de tímido; esté o no de acuerdo,
                                puedo impresionar a otros como alguien reservado y pensativo</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta8" value="x">
                            <span class="form-check-label">8. Me gusta compartir ocasiones especiales sólo con alguna
                                otra persona o quizás con algunos amigos íntimos</span>
                        </label>
                    </main>

                    <!-- Repite la estructura para las preguntas restantes cambiando los números y textos correspondientes -->
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta9" value="x">
                            <span class="form-check-label">9. Desearía imponer mis ideas con más fuerza. Me molesta que
                                otros digan antes cosas que yo estaba por decir</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta10" value="x">
                            <span class="form-check-label">10. Mis padres me decían cuando era niño (a), "Ve afuera a
                                jugar con tus amigos", porque se preocupaban que yo jugara solo(a)</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta11" value="x">
                            <span class="form-check-label">11. Prefiero respuestas específicas a preguntas específicas;
                                ejemplo, cuando pregunto la hora me gusta que me digan son las 3:32 y me molesta que me
                                digan faltan 28 minutos para las 4.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta12" value="x">
                            <span class="form-check-label">12. Me gusta concentrarme en lo que estoy haciendo en ese
                                momento y generalmente no me preocupa lo que sigue; es más, prefiero hacer algo para
                                pensar en eso.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta13" value="x">
                            <span class="form-check-label">13. Encuentro más satisfactorio aquellos trabajos que
                                producen resultados notorios; aunque, me disguste el trabajo de la casa, preferiría
                                limpiar mi escritorio a pensar que me depara el futuro de mi carrera..</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta14" value="x">
                            <span class="form-check-label">14. Prefiero resultados con hechos y números que con ideas y
                                teorías.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta15" value="x">
                            <span class="form-check-label">15. Me siento frustrado cuando las personas me dan
                                instrucciones poco claras o cuando alguien me dice: "Este es el plan general, nos
                                ocuparemos de los detalles después".</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta16" value="x">
                            <span class="form-check-label">16. Pienso en varias cosas al mismo tiempo y a menudo mis
                                amigos me dicen que estoy ausente</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta17" value="x">
                            <span class="form-check-label">17. Creo que al hablar de detalles aburridos no tiene
                                sentido.</span>
                        </label>
                    </main>

                    <!-- Continúa con el mismo formato para el resto de preguntas -->
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta18" value="x">
                            <span class="form-check-label">18. Creo que el tiempo es relativo, no importa la hora a
                                menos que la reunión haya iniciado sin mi</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta19" value="x">
                            <span class="form-check-label">19. Encuentro más atractivo buscar las relaciones profundas
                                de las cosas, siempre estoy preguntándome ¿Qué significan? En lugar de
                                aceptarlas.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta20" value="x">
                            <span class="form-check-label">20. Tiendo a dar una respuesta general a cualquier pregunta;
                                no comprendo por qué tanta gente no puede seguir mis instrucciones y me irrito cuando la
                                gente me presiona en busca de especificaciones.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta21" value="x">
                            <span class="form-check-label">21. Soy capaz de mantenerme frío y calmado cuando todo el
                                mundo está alterado.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta22" value="x">
                            <span class="form-check-label">22. Preferiría resolver una disputa basándome en lo justo y
                                verdadero más que lo que hace a la gente feliz y que se olvidan del
                                objetivo.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta23" value="x">
                            <span class="form-check-label">23. Me gusta demostrar mi punto de vista por motivos de
                                claridad; es habitual en mí discutir ambos puntos de vista en un debate simplemente para
                                ampliar mi horizonte intelectual.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta24" value="x">
                            <span class="form-check-label">24. Soy una persona con ideas firmes que una de corazón
                                tierno. Si estoy en desacuerdo, prefiero decírselos que callar sin esperar a que estén
                                de acuerdo o no.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta25" value="x">
                            <span class="form-check-label">25. Me enorgullezco de ser objetivo y no me importa si las
                                personas me dicen que soy frío o indiferente. Sí sé que no estoy alejado de la
                                realidad.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta26" value="x">
                            <span class="form-check-label">26. Considero como una buena decisión la que se toma en
                                cuenta los sentimientos de otros.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta27" value="x">
                            <span class="form-check-label">27. Me extralimito tratando de satisfacer las necesidades de
                                otros, hago cualquier cosa que sea necesaria para acomodar a los demás, incluso a
                                expensas de otras personas.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta28" value="x">
                            <span class="form-check-label">28. Me pongo en el lugar de los demás, pregunto siempre si
                                les afectará las decisiones que se tomen en las reuniones, eventos y
                                otros.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta29" value="x">
                            <span class="form-check-label">29. Disfruto dando servicios necesarios a la gente, aunque
                                algunos se aprovechen de mí.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta30" value="x">
                            <span class="form-check-label">30. A menudo me pregunto si alguien se preocupa por lo que yo
                                desee aunque tenga dificultad en decírselo a
                                alguien.</span>
                        </label>
                    </main>
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta31" value="x">
                            <span class="form-check-label">31. Siempre espero a otros, quienes nunca parecen ser
                                puntuales.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta32" value="x">
                            <span class="form-check-label">32. Tengo un lugar para cada cosa y no me siento satisfecho
                                hasta que cada cosa esté en su sitio</span>
                        </label>
                    </main>

                    <!-- Continúa con el mismo formato para el resto de preguntas -->
                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta33" value="x">
                            <span class="form-check-label">33. Me despierto por la mañana y sé bastante bien cómo será
                                mi día; tengo una agenda armada y la sigo, me altero cuando las cosas no van como lo he
                                planeado.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta34" value="x">
                            <span class="form-check-label">34. No me gustan las sorpresas y se lo hago saber a los
                                demás.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta35" value="x">
                            <span class="form-check-label">35. Me deleita el orden, tengo mi manera especial para
                                guardar las cosas entre mi escritorio, archivos, closets, o para colgar cosas en la
                                pared.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta36" value="x">
                            <span class="form-check-label">36. Me distraigo fácilmente, me pierdo en el camino de la
                                puerta de la calle al auto.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta37" value="x">
                            <span class="form-check-label">37. No planifico una tarea hasta ver que es lo que se
                                requiere, la gente me acusa de ser desorganizado, aunque yo sé mejor lo que se debe
                                hacer. </span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta38" value="x">
                            <span class="form-check-label">38. No creo que lo material sea importante, aunque preferiría
                                tener las cosas en orden; lo importante es la creatividad, la espontaneidad y la
                                capacidad de respuesta.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta39" value="x">
                            <span class="form-check-label">39. Convierte todo trabajo en una diversión; si un trabajo no
                                puedo hacer algo entretenido probablemente no sea digno de
                                hacerse.</span>
                        </label>
                    </main>

                    <main class="highlightable">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="respuesta40" value="x">
                            <span class="form-check-label">40. No me gusta que me obliguen a tomar decisiones; prefiero
                                mantener mis opciones abiertas</span>
                        </label>
                    </main>

                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>

            </form>

    </div>

    </main>


    <script>
        const highlightableElements = document.querySelectorAll('.highlightable');

        highlightableElements.forEach(function (element) {
            element.addEventListener('mouseover', function () {
                element.style.backgroundColor = '#a6a2a2';
            });

            element.addEventListener('mouseout', function () {
                element.style.backgroundColor = '';
            });
        });
    </script>
</body>

</html>

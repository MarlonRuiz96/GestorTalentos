<?php require_once APPPATH . 'views/Dashboard/pruebas.php'; ?>

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
        <h1>Prueba 16 PF</h1>
    </header>

    <main>
        <div class="d-flex justify-content-start">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="d-block" alt="Imagen"
                style="width: 35%; height: auto;"><br><br>
            <p class="text-center"><br><br>Este es un cuestionario de sus actitudes. Lo que hace o lo que piensa acerca
                de ciertas situaciones
                Las peronsas piensan de una manera u otra. Por lo tanto, no existen respuestas "Correctas" o
                "Incorrectas" a las preguntas de este formulario
                Ahora, responda las 102 preguntas similares que se plantean y para contestarlas tenga presente lo
                siguiente:

            </p>



        </div>
        <div class="d-flex justify-content-center">
            <br>
            1- Conteste las preguntas tan franca y honradamente como le sea posible. No existe ventaja en
            crear una mejor impresión personal. No marque una respuesta que no sea cierta por creer que
            "Es lo que debe decir" <br><br>
            2- Conteste con la mayor rapidez posible. No dedique tanto tiempo a meditar sobre las preguntas
            Anote su primera reacción y pase de allí a la próxima pregunta <br><br>
            3- Marque la respuesta "Si" o (A) o la Respesta "No" (o C) con una X para la mayoría de preguntas<br><br>
            4- Las respuestas B se marcan cuando en REALIDAD sea difícil contestar . Hay algunas que son de
            lógica y sentido común que se encuentran en las respuestas B, ponga atención a las mismas<br><br>
            5- Conteste a todas las preguntas sin excepción. Habrá preguntas que no reflejan sus ideas, pero
        </div><br>
        <h2 style="text-align: center;">
            Por favor no abandone la prueba o quedará anulada.
        </h2>

        <br><br>

        <main>
            <div class="container">
                <form method="post" action="<?= site_url('DpiController/procesarPF/') ?>">
                    <input type="hidden" name="DPI" value="<?= $Candidato->DPI ?>">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Pregunta planteada (Lea bien antes de responder)</th>
                                <th scope="col">A (SI)</th>
                                <th scope="col">B (N/S)</th>
                                <th scope="col">C (No)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Está su memoria mejor ahora que antes?</td>
                                <td><input class="form-check-input" type="radio" name="1a" id="opcion1A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="1b" id="opcion1B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="1c" id="opcion1C" value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>¿Podría tolerar usted vivir solo, lejos de todo el mundo, como un ermitaño?</td>
                                <td><input class="form-check-input" type="radio" name="2a" id="opcion2A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="2b" id="opcion2B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="2c" id="opcion2C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>¿Qué opina usted de un criminal que dice: "El cielo está abajo y en Invierno hace
                                    calor? (A) Lunático, (B) Chistoso o (C ) Estúpido </td>
                                <td><input class="form-check-input" type="radio" name="3a" id="opcion3A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="3b" id="opcion3B" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="3c" id="opcion3C" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>¿Qué hace cuando se encuentra con una persona desarreglada (A) La rechaza, (B) no
                                    sabe o ( C) No le da importancia.</td>
                                <td><input class="form-check-input" type="radio" name="4a" id="opcion4A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="4b" id="opcion4B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="4c" id="opcion4C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>A veces trata de ser demasiado gentil con los (as) meseros (as) </td>
                                <td><input class="form-check-input" type="radio" name="5a" id="opcion5A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="5b" id="opcion5B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="5c" id="opcion5C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>En una fiesta: prefiere usted esperar que otra gente empiece a contar los chistes,
                                    cuentos o historias?
                                </td>
                                <td><input class="form-check-input" type="radio" name="6a" id="opcion6A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="6b" id="opcion6B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="6c" id="opcion6C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>¿Cree usted que la gente debería observar las leyes morales más rígidamente?
                                </td>
                                <td><input class="form-check-input" type="radio" name="7a" id="opcion7A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="7b" id="opcion7B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="7c" id="opcion7C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>A la mayoría de la gente que usted conoce, le da verdadero gusto encontrarle en una
                                    fiesta?
                                </td>
                                <td><input class="form-check-input" type="radio" name="8a" id="opcion8A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="8b" id="opcion8B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="8c" id="opcion8C" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>9</td>
                                <td>Preferiría hacer ejercicio con: (A) Esgrima y baile; (B) N/A,( C) El box y Baseball

                                </td>
                                <td><input class="form-check-input" type="radio" name="9a" id="opcion9A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="9b" id="opcion9B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="9c" id="opcion9C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>10</td>
                                <td>¿Le dan risa las grandes diferencias entre lo que hace la gente y lo que dice la
                                    gente?
                                </td>
                                <td><input class="form-check-input" type="radio" name="10a" id="opcion10A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="10b" id="opcion10B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="10c" id="opcion10C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>11</td>
                                <td>Cuando era niño (a), ¿sentía tristeza al salir de casa para ir a la escuela todos
                                    los días?

                                </td>
                                <td><input class="form-check-input" type="radio" name="11a" id="opcion11A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="11b" id="opcion11B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="11c" id="opcion11C" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>¿Qué hace usted si se pasa por alto algún comentario suyo?</td>
                                <td><input class="form-check-input" type="radio" name="12a" id="opcion12A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="12b" id="opcion12B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="12c" id="opcion12C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 13 -->
                            <tr>
                                <td>13</td>
                                <td>¿Evita usted la excitación de cualquier cosa porque lo cansa?</td>
                                <td><input class="form-check-input" type="radio" name="13a" id="opcion13A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="13b" id="opcion13B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="13c" id="opcion13C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 14 -->
                            <tr>
                                <td>14</td>
                                <td>Qué prefiere jugar:  (A) Ajedrez; (B) N/A; o (C ) Bolos?</td>
                                <td><input class="form-check-input" type="radio" name="14a" id="opcion14A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="14b" id="opcion14B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="14c" id="opcion14C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 15 -->
                            <tr>
                                <td>15</td>
                                <td>Cuando piensa hacer algo, ¿Lo trata de hacer completamente a solas, sin solicitar
                                    ayuda de los demás?</td>
                                <td><input class="form-check-input" type="radio" name="15a" id="opcion15A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="15b" id="opcion15B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="15c" id="opcion15C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 16 -->
                            <tr>
                                <td>16</td>
                                <td>Dedica usted tiempo pensando: "Lo que podría haber sido"?</td>
                                <td><input class="form-check-input" type="radio" name="16a" id="opcion16A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="16b" id="opcion16B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="16c" id="opcion16C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 17 -->
                            <tr>
                                <td>17</td>
                                <td>¿Se deshace fácilmente de las preocupaciones?</td>
                                <td><input class="form-check-input" type="radio" name="17a" id="opcion17A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="17b" id="opcion17B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="17c" id="opcion17C" value="0">
                                </td>
                            </tr>
                            <!-- Pregunta 18 -->
                            <tr>
                                <td>18</td>
                                <td>En alguna ocasión, aunque haya sido por un momento, ¿Ha sentido resentimiento por
                                    sus padres?</td>
                                <td><input class="form-check-input" type="radio" name="18a" id="opcion18A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="18b" id="opcion18B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="18c" id="opcion18C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 19 -->
                            <tr>
                                <td>19</td>
                                <td>¿Tomaría usted un trabajo en el que tuviera que escuchar quejas de los empleados o
                                    de clientes durante el día entero?</td>
                                <td><input class="form-check-input" type="radio" name="19a" id="opcion19A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="19b" id="opcion19B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="19c" id="opcion19C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 20 -->
                            <tr>
                                <td>20</td>
                                <td>¿Qué es lo opuesto a inexacto? <br>  (A) Casual; (B) Preciso; (C ) Burdo</td>
                                <td><input class="form-check-input" type="radio" name="20a" id="opcion20A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="20b" id="opcion20B" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="20c" id="opcion20C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 21 -->
                            <tr>
                                <td>21</td>
                                <td>¿Siempre tiene usted mucha energía para lo que necesita?</td>
                                <td><input class="form-check-input" type="radio" name="21a" id="opcion21A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="21b" id="opcion21B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="21c" id="opcion21C" value="1">
                                </td>
                            </tr>
                            <!-- Pregunta 22 -->
                            <tr>
                                <td>22</td>
                                <td>¿Le apenaría ser parte de un grupo o campo nudista?</td>
                                <td><input class="form-check-input" type="radio" name="22a" id="opcion22A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="22b" id="opcion22B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="22c" id="opcion22C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 23 -->
                            <tr>
                                <td>23</td>
                                <td>¿Busca reuniones grandes como fiestas o bailes?</td>
                                <td><input class="form-check-input" type="radio" name="23a" id="opcion23A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="23b" id="opcion23B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="23c" id="opcion23C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 24 -->
                            <tr>
                                <td>24</td>
                                <td>Cree usted que: <br>  (A) En trabajos que no requieren cuidado que otros, (B) N/A o ( C) Cualquier trabajo que deba hacerse bien</td>
                                <td><input class="form-check-input" type="radio" name="24a" id="opcion24A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="24b" id="opcion24B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="24c" id="opcion24C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 25 -->
                            <tr>
                                <td>25</td>
                                <td>Se disgusta usted por la forma en que le mira la gente al caminar</td>
                                <td><input class="form-check-input" type="radio" name="25a" id="opcion25A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="25b id=" opcion25B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="25c" id="opcion25C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 26 -->
                            <tr>
                                <td>26</td>
                                <td>Qué prefiere usted: <br>(A) Obispo; (B) N/A o ( C) Coronel</td>
                                <td><input class="form-check-input" type="radio" name="26a" id="opcion26A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="26b" id="opcion26B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="26c" id="opcion26C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 27 -->
                            <tr>
                                <td>27</td>
                                <td>Si un vecino le hace trampas <br>  (A) Usted se acomoda; (B) No actúa o (C ) Lo desenmascara</td>
                                <td><input class="form-check-input" type="radio" name="27a" id="opcion27A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="27b" id="opcion27B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="27c" id="opcion27C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 28 -->
                            <tr>
                                <td>28</td>
                                <td>Preferiría ver: <br>  (A) Una buena película de la colonización (B) N/A o (C ) Una farsa ingeniosa sobre la sociedad del futuro</td>
                                <td><input class="form-check-input" type="radio" name="28a" id="opcion28A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="28b" id="opcion28B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="28c" id="opcion28C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 29 -->
                            <tr>
                                <td>29</td>
                                <td>Cuando se ha hecho responsable de algún proyecto: <br> (A) Insiste hasta concluir; (B) N/A o (C ) Renuncia cuando no sale bien</td>
                                <td><input class="form-check-input" type="radio" name="29a" id="opcion29A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="29b" id="opcion29B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="29c" id="opcion29C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 30 -->
                            <tr>
                                <td>30</td>
                                <td>Si alguien muestra mala educación:  (A) No dice nada para no fastidiar, (B) N/A o (C ) Le hace ver a esa persona su malestar</td>
                                <td><input class="form-check-input" type="radio" name="30a" id="opcion30A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="30b" id="opcion30B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="30c" id="opcion30C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 31 -->
                            <tr>
                                <td>31</td>
                                <td>Con alquien que le acaban de presentar: <br> (A) Habla sobre política y sociedad; (B) Se intimida o (C ) Sobre la evolución humana </td>
                                <td><input class="form-check-input" type="radio" name="31a" id="opcion31A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="31b" id="opcion31B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="31c" id="opcion31C" value="1">
                                </td>
                            </tr>
                            <!-- Pregunta 32 -->
                            <tr>
                                <td>32</td>
                                <td>¿Cree usted que se debe aplazar la vacuna a niños (as) pequeños (as) porque es cruel
                                    y los hace llorar?</td>
                                <td><input class="form-check-input" type="radio" name="32a" id="opcion32A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="32b" id="opcion32B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="32c" id="opcion32C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 33 -->
                            <tr>
                                <td>33</td>
                                <td>En qué confía? <br>(A) Seguro sobre la Vida (B) N/A (C ) La educación</td>
                                <td><input class="form-check-input" type="radio" name="33a" id="opcion33A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="33b" id="opcion33B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="33c" id="opcion33C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 34 -->
                            <tr>
                                <td>34</td>
                                <td>¿Siente usted apuros, tensión o ansiedad cuando espera un tren o autobús a sabiendas
                                    que tiene tiempo de sobra?</td>
                                <td><input class="form-check-input" type="radio" name="34a" id="opcion34A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="34b" id="opcion34B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="34c" id="opcion34C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 35 -->
                            <tr>
                                <td>35</td>
                                <td>¿Le es difícil admitir que se ha equivocado en ocasiones?</td>
                                <td><input class="form-check-input" type="radio" name="35a" id="opcion35A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="35b" id="opcion35B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="35c" id="opcion35C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 36 -->
                            <tr>
                                <td>36</td>
                                <td>En una fábrica, preferiría usted encargarse de: <br> (A) Máquinas; (B) N/A o (C ) Entrevistar y contratar al nuevo personal</td>
                                <td><input class="form-check-input" type="radio" name="36a" id="opcion36A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="36b" id="opcion36B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="36c" id="opcion36C" value="1">
                                </td>
                            </tr>
                            <!-- Pregunta 37 -->
                            <tr>
                                <td>37</td>
                                <td>¿Cuál palabra no va con las otras dos? <br>(A) Gato; (B) Atrás, (C ) Sol</td>
                                <td><input class="form-check-input" type="radio" name="37a" id="opcion37A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="37b" id="opcion37B" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="37c" id="opcion37C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 38 -->
                            <tr>
                                <td>38</td>
                                <td>¿Es usted de salud variable que a veces le obliga a cambiar sus proyectos
                                    inesperadamente?</td>
                                <td><input class="form-check-input" type="radio" name="38a" id="opcion38A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="38b" id="opcion38B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="38c" id="opcion38C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 39 -->
                            <tr>
                                <td>39</td>
                                <td>¿Le gustaría ser atendido por sirvientes personales?</td>
                                <td><input class="form-check-input" type="radio" name="39a" id="opcion39A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="39b" id="opcion39B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="39c" id="opcion39C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 40 -->
                            <tr>
                                <td>40</td>
                                <td>¿Se siente usted incómodo en compañía de otras personas, de manera que nunca
                                    presenta su mejor aspecto o imagen?</td>
                                <td><input class="form-check-input" type="radio" name="40a" id="opcion40A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="40b" id="opcion40B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="40c" id="opcion40C" value="1">
                                </td>
                            </tr>
                            <!-- Pregunta 41 -->
                            <tr>
                                <td>41</td>
                                <td>Si le sobra dinero de sus necesidades cotidianas, ¿Donaría gran parte del sobrante a
                                    la iglesia o causa benéfica merecedora?</td>
                                <td><input class="form-check-input" type="radio" name="41a" id="opcion41A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="41b" id="opcion41B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="41c" id="opcion41C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 42 -->
                            <tr>
                                <td>42</td>
                                <td>¿Hay veces que se enfurece tanto que decide no decir nada?</td>
                                <td><input class="form-check-input" type="radio" name="42a" id="opcion42A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="42b" id="opcion42B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="42c" id="opcion42C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 43 -->
                            <tr>
                                <td>43</td>
                                <td>¿Puede hacer trabajo duro sin fatigarse tanto como los demás?</td>
                                <td><input class="form-check-input" type="radio" name="43a" id="opcion43A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="43b" id="opcion43B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="43c" id="opcion43C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 44 -->
                            <tr>
                                <td>44</td>
                                <td>¿Cree usted que los testigos deben decir la verdad siempre?</td>
                                <td><input class="form-check-input" type="radio" name="44a" id="opcion44A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="44b" id="opcion44B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="44c" id="opcion44C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 45 -->
                            <tr>
                                <td>45</td>
                                <td>¿Le ayuda ir y venir cuando piensa?</td>
                                <td><input class="form-check-input" type="radio" name="45a" id="opcion45A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="45b" id="opcion45B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="45c" id="opcion45C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 46 -->
                            <tr>
                                <td>46</td>
                                <td>Nuestro país debe invertir en: <br> (A) Armas; (B) N/A;  (C ) Escuelas</td>
                                <td><input class="form-check-input" type="radio" name="46a" id="opcion46A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="46b" id="opcion46B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="46c" id="opcion46C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 47 -->
                            <tr>
                                <td>47</td>
                                <td>Prefiere: <br>(A) Jugar barajas; (B) N/A (C) Viendo fotos del recuerdo</td>
                                <td><input class="form-check-input" type="radio" name="47a" id="opcion47A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="47b" id="opcion47B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="47c" id="opcion47C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 48 -->
                            <tr>
                                <td>48</td>
                                <td>Prefiere: <br>(A) Una novela histórica; (B) N/A (C) Ensayo científico.</td>
                                <td><input class="form-check-input" type="radio" name="48a" id="opcion48A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="48b" id="opcion48B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="48c" id="opcion48C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 49 -->
                            <tr>
                                <td>49</td>
                                <td>¿Está seguro que hay más gente amable que tonta en el mundo?</td>
                                <td><input class="form-check-input" type="radio" name="49a" id="opcion49A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="49b" id="opcion49B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="49c" id="opcion49C" value="0">
                                </td>
                            </tr>
                            <!-- Pregunta 50 -->
                            <tr>
                                <td>50</td>
                                <td>¿Cuándo elabora más proyectos, es usted más enérgico que otras personas que han
                                    tenido éxito?</td>
                                <td><input class="form-check-input" type="radio" name="50a" id="opcion50A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="50b" id="opcion50B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="50c" id="opcion50C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 51 -->
                            <tr>
                                <td>51</td>
                                <td>Hay veces que no prefiere ver a nadie</td>
                                <td><input class="form-check-input" type="radio" name="51a" id="opcion51A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="51b" id="opcion51B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="51c" id="opcion51C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 52 -->
                            <tr>
                                <td>52</td>
                                <td>SI algo que hace es correcto, ¿Siempre le es fácil hacerlo?</td>
                                <td><input class="form-check-input" type="radio" name="52a" id="opcion52A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="52b" id="opcion52B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="52c" id="opcion52C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 53 -->
                            <tr>
                                <td>53</td>
                                <td>Prefiere: <br> (A) Trabajar en una oficina de negocio, organizando a la gente; (B) N/A (C ) Ser arquitecto, proyectando edificios</td>
                                <td><input class="form-check-input" type="radio" name="53a" id="opcion53A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="53b" id="opcion53B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="53c" id="opcion53C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 54 -->
                            <tr>
                                <td>54</td>
                                <td>El negro se compara con el gris como el dolor se compara con: <br>(A) La Herida; (B) La enfermedad y (C ) La molestia</td>
                                <td><input class="form-check-input" type="radio" name="54a" id="opcion54A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="54b" id="opcion54B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="54c" id="opcion54C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 55 -->
                            <tr>
                                <td>55</td>
                                <td>¿Siempre dueme usted sin hablar o caminar dormido?</td>
                                <td><input class="form-check-input" type="radio" name="55a" id="opcion55A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="55b" id="opcion55B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="55c" id="opcion55C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 56 -->
                            <tr>
                                <td>56</td>
                                <td>Si es necesario, puede usted decir una mentira a un desconocido sin cambiar de
                                    expresión o girar su vista?</td>
                                <td><input class="form-check-input" type="radio" name="56a" id="opcion56A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="56b" id="opcion56B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="56c" id="opcion56C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 57 -->
                            <tr>
                                <td>57</td>
                                <td>¿Participa o ha participado en algún club, equipo o grupo social?</td>
                                <td><input class="form-check-input" type="radio" name="57a" id="opcion57A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="57b" id="opcion57B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="57c" id="opcion57C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 58 -->
                            <tr>
                                <td>58</td>
                                <td>¿A quien admira más? <br> (A) Una persona lista pero poco confiable (B) N/A; (C ) Una persona media capaz a resistir tentaciones</td>
                                <td><input class="form-check-input" type="radio" name="58a" id="opcion58A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="58b" id="opcion58B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="58c" id="opcion58C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 59 -->
                            <tr>
                                <td>59</td>
                                <td>Cuando presenta una queja justa, siempre consigue la atención?</td>
                                <td><input class="form-check-input" type="radio" name="59a" id="opcion59A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="59b" id="opcion59B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="59c" id="opcion59C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 60 -->
                            <tr>
                                <td>60</td>
                                <td>Las circunstancias desalentadoras, lo dejan al borde de lágrimas?</td>
                                <td><input class="form-check-input" type="radio" name="60a" id="opcion60A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="60b" id="opcion60B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="60c" id="opcion60C" value="1">
                                </td>
                            </tr>
                            <!-- Pregunta 61 -->
                            <tr>
                                <td>61</td>
                                <td>¿Será que los países extranjeros sienten amistad por nosotros?</td>
                                <td><input class="form-check-input" type="radio" name="61a" id="opcion61A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="61b" id="opcion61B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="61c" id="opcion61C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 62 -->
                            <tr>
                                <td>62</td>
                                <td>¿Hay momentos del día en que le gusta estar solo con sus pensamientos, aparte de la
                                    gente?</td>
                                <td><input class="form-check-input" type="radio" name="62a" id="opcion62A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="62b" id="opcion62B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="62c" id="opcion62C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 63 -->
                            <tr>
                                <td>63</td>
                                <td>¿Hay veces que se desespera con reglas y restricciones pequeñas que en momentos más
                                    calmados usted acepta?</td>
                                <td><input class="form-check-input" type="radio" name="63a" id="opcion63A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="63b" id="opcion63B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="63c" id="opcion63C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 64 -->
                            <tr>
                                <td>64</td>
                                <td>¿Cree usted que la educación moderna no es tan buena como lo era la vieja escuela?
                                </td>
                                <td><input class="form-check-input" type="radio" name="64a" id="opcion64A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="64b" id="opcion64B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="64c" id="opcion64C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 65 -->
                            <tr>
                                <td>65</td>
                                <td>¿Cómo aprendió usted más en la escuela? <br>(A) Asistiendo a clases; (B) N/A o (C ) Leyendo Textos</td>
                                <td><input class="form-check-input" type="radio" name="65a" id="opcion65A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="65b" id="opcion65B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="65c" id="opcion65C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 66 -->
                            <tr>
                                <td>66</td>
                                <td>¿Evita usted mezclarse con responsabilidades sociales?</td>
                                <td><input class="form-check-input" type="radio" name="66a" id="opcion66A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="66b" id="opcion66B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="66c" id="opcion66C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 67 -->
                            <tr>
                                <td>67</td>
                                <td>Cuando un problema es difícil y tiene mucho qué hacer, busca ud: <br>(A) Un problema distinto (B) N/A (C ) Otra forma de resolver</td>
                                <td><input class="form-check-input" type="radio" name="67a" id="opcion67A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="67b" id="opcion67B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="67c" id="opcion67C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 68 -->
                            <tr>
                                <td>68</td>
                                <td>¿Demuestra ansiedad, risa, o ira por incidentes pequeños?</td>
                                <td><input class="form-check-input" type="radio" name="68a" id="opcion68A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="68b" id="opcion68B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="68c" id="opcion68C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 69 -->
                            <tr>
                                <td>69</td>
                                <td>¿Hay veces que su mente no funciona bien como otras veces?</td>
                                <td><input class="form-check-input" type="radio" name="69a" id="opcion69A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="69b" id="opcion69B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="69c" id="opcion69C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 70 -->
                            <tr>
                                <td>70</td>
                                <td>¿Cumple con citas a horas que le conviene a la gente y no a Ud?</td>
                                <td><input class="form-check-input" type="radio" name="70a" id="opcion70A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="70b" id="opcion70B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="70c" id="opcion70C" value="0">
                                </td>
                            </tr>
                            <!-- Pregunta 71 -->
                            <tr>
                                <td>71</td>
                                <td>Si la mamá de María es hermana del papá de Federico, ¿Qué parentesco tiene éste con
                                    el papá de María? <br>(A) Primo; (B) Tío o (C ) Sobrino</td>
                                <td><input class="form-check-input" type="radio" name="71a" id="opcion71A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="71b" id="opcion71B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="71c" id="opcion71C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 72 -->
                            <tr>
                                <td>72</td>
                                <td>¿Critica usted el trabajo de mucha gente?</td>
                                <td><input class="form-check-input" type="radio" name="72a" id="opcion72A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="72b" id="opcion72B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="72c" id="opcion72C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 73 -->
                            <tr>
                                <td>73</td>
                                <td>Le molesta la gente que presume hacer cosas mejores que otros?</td>
                                <td><input class="form-check-input" type="radio" name="73a" id="opcion73A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="73b" id="opcion73B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="73c" id="opcion73C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 74 -->
                            <tr>
                                <td>74</td>
                                <td>Le encanta salir de viaje casi todo el tiempo?</td>
                                <td><input class="form-check-input" type="radio" name="74a" id="opcion74A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="74b" id="opcion74B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="74c" id="opcion74C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 75 -->
                            <tr>
                                <td>75</td>
                                <td>¿Se ha desmayado por un dolor repentino o por ver la sangre?</td>
                                <td><input class="form-check-input" type="radio" name="75a" id="opcion75A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="75b" id="opcion75B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="75c" id="opcion75C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 76 -->
                            <tr>
                                <td>76</td>
                                <td>¿Dedica tiempo para platicar de problemas regionales con otros?</td>
                                <td><input class="form-check-input" type="radio" name="76a" id="opcion76A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="76b" id="opcion76B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="76c" id="opcion76C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 77 -->
                            <tr>
                                <td>77</td>
                                <td>Qué prefiere ser? <br>(A) Ingeniero; (B) N/A (C ) Profesor de Sociales</td>
                                <td><input class="form-check-input" type="radio" name="77a" id="opcion77A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="77b" id="opcion77B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="77c" id="opcion77C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 78 -->
                            <tr>
                                <td>78</td>
                                <td>Se domina Ud para no resolver los problemas de otras personas?</td>
                                <td><input class="form-check-input" type="radio" name="78a" id="opcion78A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="78b" id="opcion78B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="78c" id="opcion78C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 79 -->
                            <tr>
                                <td>79</td>
                                <td>¿Cuántos de sus vecinos le aburren platicando? <br> (A) La Mayoría; (B) N/A; (C ) Casi ninguno</td>
                                <td><input class="form-check-input" type="radio" name="79a" id="opcion79A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="79b" id="opcion79B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="79c" id="opcion79C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 80 -->
                            <tr>
                                <td>80</td>
                                <td>¿Si hay propaganda escondida en lo que está leyendo, usted generalmente lo nota
                                    antes de que alguien se lo indique?</td>
                                <td><input class="form-check-input" type="radio" name="80a" id="opcion80A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="80b" id="opcion80B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="80c" id="opcion80C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 81 -->
                            <tr>
                                <td>81</td>
                                <td>¿Cree usted que todo cuento debe tener una moraleja?</td>
                                <td><input class="form-check-input" type="radio" name="81a" id="opcion81A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="81b" id="opcion81B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="81c" id="opcion81C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 82 -->
                            <tr>
                                <td>82</td>
                                <td>Hay dificultad en la gente cuando: <br>(A)Modifica métodos ya bien comprobados; (B)N/A; (C )Rechaza nuevos métodos y modernos</td>
                                <td><input class="form-check-input" type="radio" name="82a" id="opcion82A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="82b" id="opcion82B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="82c" id="opcion82C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 83 -->
                            <tr>
                                <td>83</td>
                                <td>¿Hay veces que no se atreve a utilizar sus propias ideas porque le parecen poco
                                    prácticas?</td>
                                <td><input class="form-check-input" type="radio" name="83a" id="opcion83" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="83b" id="opcion83a" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="83c" id="opcion83C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 84 -->
                            <tr>
                                <td>84</td>
                                <td>¿Parecen molestarse algunas personas presumidas al ver que usted se les acerca?</td>
                                <td><input class="form-check-input" type="radio" name="84a" id="opcion84A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="84b" id="opcion84B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="84c" id="opcion84C" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td>85</td>
                                <td>¿Puede confiar en su memoria que no le traiciona, aún en detalles muy pequeños?</td>
                                <td> <input class="form-check-input" type="radio" name="85a" id="opcion85A" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="85b" id="opcion85B" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="85c" id="opcion85C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>86</td>
                                <td>¿A veces es usted menos considerado de las demás personas que ellas de usted?</td>
                                <td> <input class="form-check-input" type="radio" name="86a" id="opcion86A" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="86b" id="opcion86B" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="86c" id="opcion86C" value="0">
                                </td>
                            </tr>

                            <tr>
                                <td>87</td>
                                <td>¿Es usted lento para decir lo que siente en comparación con la demás gente?</td>
                                <td> <input class="form-check-input" type="radio" name="87a" id="opcion87A" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="87b" id="opcion87B" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="87c" id="opcion87C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>88</td>
                                <td>¿Qué número es el correcto para continuar con la siguiente serie de números: 1,
                                    2,3,6,5, es? <br> (A) 5; (B) 7; (C ) 4 </td>
                                <td> <input class="form-check-input" type="radio" name="88a" id="opcion88A" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="88b" id="opcion88B" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="88c" id="opcion88C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>89</td>
                                <td>¿Se impacienta hasta enfurecerse cuando alguien lo demora?</td>
                                <td> <input class="form-check-input" type="radio" name="89a" id="opcion89A" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="89b" id="opcion89B" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="89c" id="opcion89C" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td>90</td>
                                <td>La gente dice que Ud es una persona que se sale con la suya</td>
                                <td> <input class="form-check-input" type="radio" name="90a" id="opcion90A" value="1">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="90b" id="opcion90B" value="0">
                                </td>
                                <td> <input class="form-check-input" type="radio" name="90c" id="opcion90C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 91 -->
                            <tr>
                                <td>91</td>
                                <td>Se queja cuando no le dan el material adecuado para su trabajo?</td>
                                <td><input class="form-check-input" type="radio" name="91a" id="opcion91A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="91b" id="opcion91B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="91c" id="opcion91C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 92 -->
                            <tr>
                                <td>92</td>
                                <td>En casa: <br>(A) Platica (B) Descansa (C ) Elabora tareas especiales</td>
                                <td><input class="form-check-input" type="radio" name="92a" id="opcion92A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="92b" id="opcion92B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="92c" id="opcion92C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 93 -->
                            <tr>
                                <td>93</td>
                                <td>¿Es tímido y cauteloso en hacer nuevas amistades?</td>
                                <td><input class="form-check-input" type="radio" name="93a" id="opcion93A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="93b" id="opcion93B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="93c" id="opcion93C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 94 -->
                            <tr>
                                <td>94</td>
                                <td>¿Considera que lo que expresa la poesía se podría transmitir con la misma claridad
                                    en lenguaje común y corriente?</td>
                                <td><input class="form-check-input" type="radio" name="94a" id="opcion94A" value="1">
                                </td>
                                <td><input class="form-check-input" type="radio" name="94b" id="opcion94B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="94c" id="opcion94C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 95 -->
                            <tr>
                                <td>95</td>
                                <td>¿Sospecha que las personas son desleales en su ausencia?</td>
                                <td><input class="form-check-input" type="radio" name="95a" id="opcion95A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="95b" id="opcion95B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="95c" id="opcion95C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 96 -->
                            <tr>
                                <td>96</td>
                                <td>¿Dejan generalmente sin cambio su personalidad aún las experiencias más dramáticas
                                    en el curso del año?</td>
                                <td><input class="form-check-input" type="radio" name="96a" id="opcion96A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="96b" id="opcion96B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="96c" id="opcion96C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 97 -->
                            <tr>
                                <td>97</td>
                                <td>¿Habla usted despacito o lentamente?</td>
                                <td><input class="form-check-input" type="radio" name="97a" id="opcion97A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="97b" id="opcion97B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="97c" id="opcion97C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 98 -->
                            <tr>
                                <td>98</td>
                                <td>¿Siente usted temor o disgusto casi incontrolable hacia los animales en algún lugar
                                    en particular?</td>
                                <td><input class="form-check-input" type="radio" name="98a" id="opcion98A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="98b" id="opcion98B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="98c" id="opcion98C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 99 -->
                            <tr>
                                <td>99</td>
                                <td>Dentro de un grupo, prefiere usted: <br> (A) Trabajar sobre desarrollos técnicos (B) N/A; (C )Vigilar los registros y reglas</td>
                                <td><input class="form-check-input" type="radio" name="99a" id="opcion99A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="99b" id="opcion99B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="99c" id="opcion99C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 100 -->
                            <tr>
                                <td>100</td>
                                <td>Para saber más de sociedad, leería: <br>(A) Una novela inteligente con buenas reseñas; (B) N/A; (C )Textos estadísticos y otros datos</td>
                                <td><input class="form-check-input" type="radio" name="100a" id="opcion100A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="100b" id="opcion100B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="100c" id="opcion100C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 101 -->
                            <tr>
                                <td>101</td>
                                <td>¿Tiene sueños de noche que son algo fantásticos?</td>
                                <td><input class="form-check-input" type="radio" name="101a" id="opcion101A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="101b" id="opcion101B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="101c" id="opcion101C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 102 -->
                            <tr>
                                <td>102</td>
                                <td>Suele ponerse ansioso si se le deja solo en casa temporalmente?</td>
                                <td><input class="form-check-input" type="radio" name="102a" id="opcion102A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="102b" id="opcion102B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="102c" id="opcion102C" value="1">
                                </td>
                            </tr>

                            <!-- Pregunta 103 -->
                            <tr>
                                <td>103</td>
                                <td>¿He contestado correctamente este cuestionario?</td>
                                <td><input class="form-check-input" type="radio" name="103a" id="opcion103A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="103b" id="opcion103B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="103c" id="opcion103C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 104 -->
                            <tr>
                                <td>104</td>
                                <td>¿He contestado todas las preguntas de este cuestionario?</td>
                                <td><input class="form-check-input" type="radio" name="104a" id="opcion104A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="104b" id="opcion104B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="104c" id="opcion104C" value="0">
                                </td>
                            </tr>

                            <!-- Pregunta 105 -->
                            <tr>
                                <td>105</td>
                                <td>¿He contestado con sinceridad este cuestionario?</td>
                                <td><input class="form-check-input" type="radio" name="105a" id="opcion105A" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="105b" id="opcion105B" value="0">
                                </td>
                                <td><input class="form-check-input" type="radio" name="105c" id="opcion105C" value="0">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </main>

    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Agregar evento a todos los botones de radio
    var radios = document.querySelectorAll('.form-check-input');
    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Utilizar una expresión regular para obtener solo la parte numérica del nombre
            var groupName = this.name.match(/^\d+/)[0]; // Esto extrae solo la parte numérica al inicio del nombre
            var groupRadios = document.querySelectorAll(`input[name^="${groupName}"][name$="a"], input[name^="${groupName}"][name$="b"], input[name^="${groupName}"][name$="c"]`);

            // Asegurarse de que sólo se seleccionen los radios exactos de esa pregunta
            var exactMatchRadios = Array.from(groupRadios).filter(radio => radio.name.length === this.name.length);

            // Deshabilitar todos los radios del mismo grupo excepto el seleccionado
            exactMatchRadios.forEach(function(radio) {
                if (radio !== this) {
                    radio.disabled = true;
                }
            }, this);
        });
    });
});

    </script>


</body>

</html>
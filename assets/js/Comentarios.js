document.addEventListener("DOMContentLoaded", function() {
    const btnAgregarComentario = document.getElementById('btnAgregarComentario');

    if (btnAgregarComentario) {
        btnAgregarComentario.addEventListener('click', function() {
            const idCandidato = document.querySelector('[name="idCandidato"]').value;
            const etapa = document.getElementById('etapa').value;
            const comentario = document.getElementById('comentario').value;

            if (!etapa || !comentario.trim()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Faltan datos',
                    text: 'Por favor completa todos los campos.',
                });
                return;
            }

            // Enviar datos al servidor usando la variable global definida en la vista
            fetch(SITE_URL_AGREGAR_COMENTARIO, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        idCandidato,
                        etapa,
                        comentario,
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // Mapeo de etapas
                        const etapas = {
                            1: {
                                nombre: 'Solicitud',
                                clase: 'stage-solicitud'
                            },
                            2: {
                                nombre: 'Pruebas',
                                clase: 'stage-pruebas'
                            },
                            3: {
                                nombre: 'Entrevista',
                                clase: 'stage-entrevista'
                            },
                            4: {
                                nombre: 'Contrato',
                                clase: 'stage-contrato'
                            },
                        };

                        // Default para etapas desconocidas
                        const etapaDefault = {
                            nombre: 'Desconocida',
                            clase: 'stage-desconocida'
                        };

                        const etapaNumero = parseInt(etapa);
                        const etapaInfo = etapas[etapaNumero] || etapaDefault;

                        // Crear el nuevo comentario
                        const timelineContainer = document.querySelector('.timeline-container2');
                        const newComment = document.createElement('div');
                        newComment.className = `timeline-item ${etapaInfo.clase}`;
                        newComment.innerHTML = `
                            <div class="timeline-content">
                                <h5>${etapaInfo.nombre} <span class="date">${new Date().toLocaleDateString()}</span></h5>
                                <p>${comentario}</p>
                            </div>
                        `;
                        timelineContainer.appendChild(newComment);

                        // Limpiar el formulario
                        document.getElementById('formAgregarComentario').reset();

                        Swal.fire({
                            icon: 'success',
                            title: 'Comentario agregado',
                            text: 'El comentario se agregó correctamente.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'No se pudo agregar el comentario. Intenta nuevamente.',
                        });
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en el servidor',
                        text: 'Hubo un problema con la solicitud.',
                    });
                });
        });
    }
});

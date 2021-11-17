import { actualizadorContenido } from './actualizadorContenido.js';
import { basuraArrastrables } from './basuraArrastrables.js';
import { crearArrastrable } from './crearArrastrable.js';
import { getCookie } from './getCookie.js';

export function columnaEscucha() {

    let zonas = document.querySelectorAll(".zona");
    for (let columna of zonas) {

        // POR ENCIMA
        columna.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = "move";
        });

        // SALIR
     /*    columna.addEventListener('dragleave', function (e) {
        });
 */
        // SOLTAR 
        columna.addEventListener('drop', function (e) {
            e.preventDefault();
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.dropEffect = 'move';

            // DATOS TRANSFERIDOS
            let datos = e.dataTransfer.getData('text');
            let arr_datos = datos.split(",");
            let columna_antigua = arr_datos[0];
            let id = arr_datos[1];
            let contenido = arr_datos[2];

            let columna_actual = columna.id;

            // si me muevo a otra columna hago
            if (columna_antigua != columna_actual) {

                //PREVENIR DROP SOBRE OTRO ELEMENTO
                if (e.target.id == "columna1" || e.target.id == "columna2" || e.target.id == "columna3" || e.target.id == "columna4") {

                    // ELIMINO ARRASTRABLE DE BASE DE DATOS COLUMNA ANTERIOR
                    let deleteData = new FormData();
                    deleteData.append('action', "borrar_registro");
                    deleteData.append('tablero', getCookie('tablero_actual'));
                    deleteData.append('id_usuario', getCookie('user_id'));
                    deleteData.append('columna', columna_antigua);
                    deleteData.append('id', id);

                    fetch('ajax.php', { method: 'POST', body: deleteData })
                        .then(function (response) { if (response.ok) { return response.text(); } else { throw "Error en la llamada Ajax"; } })
                        .then(function (response) {

                            if (response) {
                                console.log("borrado");
                            }
                        })
                        .catch(function (err) { console.log(err); });

                    // ELIMINO ARRASTRABLE DE ANTERIOR COLUMNA
                    document.getElementById(columna_antigua).removeChild(document.getElementById(id));

                    //--------------------------------------------------
                    // GENERO UN REGISTRO EN COLUMNA ACTUAL
                    let data = new FormData();
                    data.append('action', "copiar_registro");
                    data.append('columna', columna_actual);
                    data.append('contenido', contenido);
                    data.append('tablero', getCookie('tablero_actual'));
                    data.append('id_usuario', getCookie('user_id'));

                    fetch('ajax.php', { method: 'POST', body: data })
                        .then(function (response) { if (response.ok) { return response.text(); } else { throw "Error en la llamada Ajax"; } })
                        .then(function (texto) {
                            let id_nuevo = texto;
                            // CREO ARRASTRABLE EN COLUMNA ACTUAL
                            let arrastrable = crearArrastrable(id_nuevo, columna_actual, contenido);
                            const colActual = e.target;
                            // SE LO APENDIZO A LA COLUMNA ACTUAL
                            colActual.appendChild(arrastrable);
                            // PONGO A LA ESCUCHA PARA ACTUALIZAR CONTENIDO O BORRAR ARRASTRABLE BASURA
                            actualizadorContenido();
                            basuraArrastrables();
                        })
                        .catch(function (err) { console.log(err); });
                } else {
                    console.log('aquí no!');
                }
                // si no me muevo a otra no hace falta
            } else {
                console.log("iguales");
                console.log("columna: " + columna.id);
                console.log("columna: " + columna_antigua);
            }
        });
        columna.addEventListener('dragstart', e => {
            e.dataTransfer.effectAllowed = 'move';
            let contenidotxtarea = e.target.children[0].value;
            let datos = columna.id + ',' + e.target.id + ',' + contenidotxtarea;
            e.dataTransfer.setData('text/plain', datos);
        });

    /*     columna.addEventListener('dragend', (e) => {
        });
        columna.addEventListener('drag', (e) => {
        }); */
    }
}

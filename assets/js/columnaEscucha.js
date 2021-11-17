import { updateContent } from './updateContent.js';
import { deleteDraggable } from './deleteDraggable.js';
import { createDraggable } from './createDraggable.js';
import { getCookie } from './getCookie.js';

export function columnaEscucha() {

    let columns = document.querySelectorAll(".columns");
    for (let column of columns) {

        // POR ENCIMA
        column.addEventListener('dragover', e => {
            e.preventDefault();
            e.dataTransfer.dropEffect = "move";
        });

        // SOLTAR 
        column.addEventListener('drop', e => {

            e.preventDefault();
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.dropEffect = 'move';
            // data TRANSFERIDOS
            let data = e.dataTransfer.getData('text');
            let arr_data = data.split(",");
            let lastColumn = arr_data[0];
            let id = arr_data[1];
            let content = arr_data[2];

            let currentColumn = column.id;

            // si me muevo a otra columna hago
            if (lastColumn != currentColumn) {

                //PREVENIR DROP SOBRE OTRO ELEMENTO
                if (e.target.id === "columna1" || e.target.id === "columna2" || e.target.id === "columna3" || e.target.id === "columna4") {

                    // ELIMINO draggable DE BASE DE data COLUMNA ANTERIOR
                    let deleteData = new FormData();
                    deleteData.append('action', "deleteRegister");
                    deleteData.append('tablero', getCookie('tablero_actual'));
                    deleteData.append('id_usuario', getCookie('user_id'));
                    deleteData.append('columna', lastColumn);
                    deleteData.append('id', id);

                    fetch('ajax.php', { method: 'POST', body: deleteData })
                        .then(function (response) {
                            if (response.ok) {
                                return response.text();
                            }
                            else {
                                throw "Error en la llamada Ajax";
                            }
                        })
                        .then(function (response) {

                            if (response) {
                                console.log("borrado");
                            }
                        })
                        .catch((err) => {
                            console.log(err);
                        });

                    // ELIMINO draggable DE ANTERIOR COLUMNA
                    document.getElementById(lastColumn).removeChild(document.getElementById(id));

                    //--------------------------------------------------
                    // GENERO UN REGISTRO EN COLUMNA ACTUAL
                    let data = new FormData();
                    data.append('action', "copiar_registro");
                    data.append('columna', currentColumn);
                    data.append('contenido', content);
                    data.append('tablero', getCookie('tablero_actual'));
                    data.append('id_usuario', getCookie('user_id'));

                    fetch('ajax.php', { method: 'POST', body: data })
                        .then((response) => {
                            if (response.ok) {
                                return response.text();
                            } else {
                                throw "Error en la llamada Ajax";
                            }
                        })
                        .then((texto) => {

                            let newId = texto;
                            let draggable = createDraggable(newId, currentColumn, content);
                            const newCurrentColumn = e.target;
                            newCurrentColumn.appendChild(draggable);
                            updateContent();
                            deleteDraggable();
                        })
                        .catch(err => console.log(err));
                } else {
                    console.log('aquí no!');
                }
                // si no me muevo a otra no hace falta
            } else {
                console.log("iguales");
                console.log("columna: " + column.id);
                console.log("columna: " + lastColumn);
            }
        });
        column.addEventListener('dragstart', e => {

            e.dataTransfer.effectAllowed = 'move';
            let textareaContent = e.target.children[0].value;
            let data = column.id + ',' + e.target.id + ',' + textareaContent;
            e.dataTransfer.setData('text/plain', data);
        });

    }
}

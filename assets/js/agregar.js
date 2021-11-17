import { updateContent } from './updateContent.js';
import { deleteDraggable } from './deleteDraggable.js';
import { createDraggable } from './createDraggable.js';
import { getCookie } from './getCookie.js';

export function agregar() {


    let agregadores = document.querySelectorAll(".agregar");
    for (let boton of agregadores) {
        boton.addEventListener('click', (e) => {

            let columna = e.currentTarget.parentNode.id;
            let data = new FormData();
            data.append('action', "crear_registro");
            data.append('tablero', getCookie('tablero_actual'));
            data.append('id_usuario', getCookie('user_id'));
            data.append('columna', columna);

            fetch('ajax.php', { method: 'POST', body: data })
                .then(function (response) { if (response.ok) { return response.text(); } else { throw "Error en la llamada Ajax"; } })
                .then(function (id) {

                    let draggable = createDraggable(id, columna);
                    document.getElementById(columna).appendChild(draggable);
                    updateContent();
                    deleteDraggable();

                })
                .catch(function (err) { console.log(err); });

        });
    }

}

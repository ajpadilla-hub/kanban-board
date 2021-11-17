import { actualizadorContenido } from './actualizadorContenido.js';
import { basuraArrastrables } from './basuraArrastrables.js';
import { crearArrastrable } from './crearArrastrable.js';
import { getCookie } from './getCookie.js';

/*         BTNS AGREGADORES          */
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

                    let arrastrable = crearArrastrable(id, columna);
                    document.getElementById(columna).appendChild(arrastrable);
                    actualizadorContenido();
                    basuraArrastrables();

                })
                .catch(function (err) { console.log(err); });

        });
    }

}

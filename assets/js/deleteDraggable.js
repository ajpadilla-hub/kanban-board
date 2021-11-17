import { getCookie } from './getCookie.js';

export function deleteDraggable() {

    let botonesEliminar = document.querySelectorAll(".imgParrafo");

    for (let botonEliminar of botonesEliminar) {
        botonEliminar.addEventListener('click', (e) => {

            let idArrastrableBorrar = e.target.parentNode.parentNode.id;
            let columna = e.currentTarget.parentNode.parentNode.parentNode.id;
            let dataBorrar = new FormData();
            dataBorrar.append('action', "registro_papelera");
            dataBorrar.append('tablero', getCookie('tablero_actual'));
            dataBorrar.append('columna', columna);
            dataBorrar.append('id', idArrastrableBorrar);


            fetch('ajax.php', { method: 'POST', body: dataBorrar })
                .then(function (response) { if (response.ok) { return response.text(); } else { throw "Error en la llamada Ajax"; } })
                .then(function (response) {

                    if (response) {
                        console.log("borrado");
                        console.log(response);
                    }
                })
                .catch(function (err) { console.log(err); });

            // ELIMINO ARRASTRABLE DE COLUMNA ACTUAL
            document.getElementById(columna).removeChild(document.getElementById(idArrastrableBorrar));

        });
    }

}

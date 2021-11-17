import { getCookie } from './getCookie.js';

export function updateContent() {

    let txtareas = document.querySelectorAll(".txt");
    for (let txtarea of txtareas) {
        txtarea.addEventListener('blur', e => {

            if (e.currentTarget.value) {

                const columna = e.currentTarget.parentNode.parentNode.id;
                const idEditar = e.currentTarget.parentNode.id;
                const editData = new FormData();
                const contenido = e.currentTarget.value;

                editData.append('action', "editar_registro");
                editData.append('tablero', getCookie('tablero_actual'));
                editData.append('id_usuario', getCookie('user_id'));
                editData.append('columna', columna);
                editData.append('id', idEditar);
                editData.append('contenido', contenido);

                // CONSULTA Y AGREGA
                fetch('ajax.php', { method: 'POST', body: editData })
                    .then(response => {
                        if (response.ok) {
                            return response.text();
                        }
                        else {
                            throw "Error en la llamada Ajax";
                        }
                    })
                    .then(texto => console.log(texto))
                    .catch(err => console.log(err));
            }
            else {
                console.log('vacio');
            }
        });
    }
}

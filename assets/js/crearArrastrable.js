export function crearArrastrable(id, columna, contenido = '') {

    const arrastrable = document.createElement('div');
    arrastrable.setAttribute('draggable', "true");
    arrastrable.setAttribute('class', "draggable");
    arrastrable.setAttribute('id', id);

    const textarea = document.createElement('textarea');
    textarea.setAttribute('cols', 30);
    textarea.setAttribute('rows', 2);
    textarea.setAttribute('draggable', "true");
    textarea.setAttribute('class', "txt");
    textarea.value = contenido;

    const parrafo = document.createElement('p');
    parrafo.setAttribute('class', 'parrafo');
    parrafo.setAttribute('draggable', "true");

    const iconoEliminar = document.createElement('img');
    iconoEliminar.setAttribute('src', './assets/images/delete.png');
    iconoEliminar.setAttribute('class', 'imgParrafo');

    parrafo.appendChild(iconoEliminar);

    arrastrable.appendChild(textarea);
    arrastrable.appendChild(parrafo);

    return arrastrable;
}

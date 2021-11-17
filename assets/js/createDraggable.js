export function createDraggable(id, column, content = '') {

    const draggable = document.createElement('div');
    draggable.setAttribute('draggable', "true");
    draggable.setAttribute('class', "draggable");
    draggable.setAttribute('id', id);

    const textarea = document.createElement('textarea');
    textarea.setAttribute('cols', 30);
    textarea.setAttribute('rows', 2);
    textarea.setAttribute('draggable', "true");
    textarea.setAttribute('class', "txt");
    textarea.value = content;

    const p = document.createElement('p');
    p.setAttribute('class', 'parrafo');
    p.setAttribute('draggable', "true");

    const garbageCan = document.createElement('img');
    garbageCan.setAttribute('src', './assets/images/delete.png');
    garbageCan.setAttribute('class', 'imgParrafo');

    p.appendChild(garbageCan);

    draggable.appendChild(textarea);
    draggable.appendChild(p);

    return draggable;
}

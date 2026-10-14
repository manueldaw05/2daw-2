const nuevoDiv = document.createElement('div');

const textoNuevo = document.createTextNode('Nuevo elemento de la lista');

nuevoDiv.appendChild('textoNuevo');

document.getElementById('lipsum').appendChild(nuevoDiv);

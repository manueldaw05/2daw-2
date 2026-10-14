const primerParrafo = document.querySelector('#lipsum p');

console.log(primerParrafo.innerHTML);

console.log(primerParrafo.textContent);

const inputText = document.querySelector('input[type="text"]');

console.log(inputText.value);

console.log(
  document.querySelector('input[name="sexo"]').parentElement.innerHTML
);
console.log(
  document.querySelectorAll('#myForm label')[3].innerHTML
);

console.log(
  document.querySelector('input[name="sexo"]').parentElement.textContent
);
console.log(
  document.querySelectorAll('#myForm label')[3].textContent
);

console.log(document.getElementsByName('sexo')[0].value);
console.log(document.querySelector('input[name="sexo"]').value);

const seleccionado = document.querySelector('input[name="sexo"]:checked');
if (seleccionado !== null) {
  console.log(seleccionado.value);
} else {
  console.log('No hay ninguna opción marcada');
}

const opcionesSexo = document.getElementsByName('sexo');
let valorSeleccionado = null;
for (const opcion of opcionesSexo) {
  if (opcion.checked) {
    valorSeleccionado = opcion.value;
  }
}
if (valorSeleccionado !== null) {
  console.log(valorSeleccionado);
} else {
  console.log('No hay ninguna opción marcada');
}
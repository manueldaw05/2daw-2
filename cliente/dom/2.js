const primerParrafo = document.querySelector('#lipsum p');
console.log(primerParrafo);

const segundoParrafo = primerParrafo.nextElementSibling;
console.log(segundoParrafo);

const tercerParrafo = segundoParrafo.parentElement;
console.log(tercerParrafo);

console.log(document.querySelector('#lipsum p'));
console.log(document.getElementById('lipsum').firstElementChild);

console.log(document.querySelectorAll('#lipsum p')[1]);
console.log(document.querySelector('#lipsum p').nextElementSibling);

console.log(document.querySelector('ul').lastElementChild);
const items = document.querySelectorAll('ul li');
console.log(items[items.length - 1]);

console.log(document.querySelector('input[name="sexo"]').parentElement);
console.log(document.querySelectorAll('#myForm label')[3]);
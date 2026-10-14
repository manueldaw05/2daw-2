console.log(document.getElementById('main'));
console.log(document.getElementsByClassName('error'));
console.log(document.getElementsByTagName('p'));
console.log(document.querySelector('p.error'));
console.log(document.querySelectorAll('p.error'));

console.log(document.getElementById('input2'));
console.log(document.querySelector('#input2'));

console.log(document.getElementsByTagName('p'));
console.log(document.querySelectorAll('p'));

console.log(document.querySelectorAll('#lipsum p'));
console.log(document.getElementById('lipsum').getElementsByTagName('p'));

console.log(document.forms[0]);
console.log(document.getElementById('myForm'));

console.log(document.getElementsByTagName('input'));
console.log(document.querySelectorAll('input'));

console.log(document.getElementsByTagName('input').getElementsByName('sexo'));
console.log(document.querySelectorAll('input[name="sexo"]'));

console.log(document.querySelectorAll('li.important'));
console.log(document.querySelector('ul').getElementsByClassName('important'));
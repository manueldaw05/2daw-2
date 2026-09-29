let notas = [4, 8, 3, 10, 5];

const ordenarNotas = (notas) => notas.sort((nota1, nota2) => nota1 - nota2);

ordenarNotas(notas);
console.log(notas);
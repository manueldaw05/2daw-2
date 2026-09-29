let alumnos = [
    {
        nombre: 'Manuel',
        edad: '21'
    },
    {
        nombre: 'Adrián',
        edad: '20'
    },
    {
        nombre: 'Carlos',
        edad: '18'
    },
    {
        nombre: 'Jaime',
        edad: '22'
    },
    {
        nombre: 'María',
        edad: '23'
    }
];

alumnos.sort((alumno1, alumno2) => alumno1.edad - alumno2.edad);

console.log(alumnos);
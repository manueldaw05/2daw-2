const person = {
    name: 'Manuel',
    age: 21,
    ciudad: 'Sevilla'
}

localStorage.setItem('person', JSON.stringify(person))
localStorage.removeItem('person')
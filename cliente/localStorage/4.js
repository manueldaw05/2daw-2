localStorage.clear()
localStorage.setItem('person', JSON.stringify({
    name: 'Manuel',
    age: 21,
    ciudad: 'Sevilla'
}))
const person = JSON.parse(localStorage.getItem('person'))
console.log(person.name)
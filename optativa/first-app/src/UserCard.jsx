import './App.css'

export default function UserCard ({ name, age, city }) {
    return (
        <h1>Hola, {name}. Tienes {age} años y vives en {city}.</h1>
    )
}
import './App.css'

export default function Greeting ({ name = 'Invitado' }) {
    return (
        <h1>Hola, {name}</h1>
    )
}
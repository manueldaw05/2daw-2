import { useState } from "react"

export default function CambiadorTexto() {
    const [texto, setTexto] = useState('Texto Original');

    function modificarTexto() {
        setTexto('Texto Modificado');
    }

    function restaurarTexto() {
        setTexto('Texto Original');
    }

  return (
    <>
        <p>Texto: {texto}</p>
        <button onClick={modificarTexto}>Modificar texto</button>
        <button onClick={restaurarTexto}>Restaurar texto</button>
    </>
  )
}
import { useState } from "react"

export default function Contador() {
    const [contador, setContador] = useState(0);

    function incrementar() {
        setContador(contador + 1);
    }

    function decrementar() {
        setContador(contador - 1);
    }

  return (
    <>
        <p>Contador: {contador}</p>
        <button onClick={incrementar}>Incrementar</button>
        <button onClick={decrementar}>Decrementar</button>
    </>
  )
}
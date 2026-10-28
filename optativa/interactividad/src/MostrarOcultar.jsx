import { useState } from "react";

export default function MostrarOcultar() {
    const [mostrar, setMostrar] = useState(false);

    function mostrarTexto() {
        setMostrar(true)
    }

    function ocultarTexto() {
        setMostrar(false)
    }

    return (
        <>
            <br></br>

            {mostrar && <p>Información secreta</p>}

            <button onClick={mostrarTexto}>
                Mostrar texto
            </button>

            <button onClick={ocultarTexto}>
                Ocultar texto
            </button>
        </>
    );
}
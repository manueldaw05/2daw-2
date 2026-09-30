const invertirCadena = (texto) => {
    let textoInvertido;

    for (let i = texto.length; i > 0; i--) {
        textoInvertido += texto.charAt(i);
    }

    console.log(textoInvertido);
}
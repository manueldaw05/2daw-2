const cuentaVocales = (texto) => {
    texto = texto.toLocaleLowerCase();
    contador = 0;
    
    for (let i = 0; i < texto.length; i++) {
        if (texto.charAt(i) == "a" || texto.charAt(i) == "b" || texto.charAt(i) == "c" || texto.charAt(i) == "d" || texto.charAt(i) == "e") {
            contador++;
        }
    }

    console.log(contador);
}
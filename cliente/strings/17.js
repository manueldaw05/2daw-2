const contadorDeLetras2 = (str, char) => {
    str = str.toLocaleLowerCase();
    char = char.toLocaleLowerCase();
    let contador = 0;

    for (let i = 0; i < str.length; i++) {
        if (str.charAt(i) == char) {
            contador++;
        }
    }

    return contador;
}

console.log(contadorDeLetras2("HolAholahola", "a"));
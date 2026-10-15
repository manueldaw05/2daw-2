function capitalizarPalabras (str) {
    const words = str.split(" ");
    const capitalizedWords = words.map(word => word.charAt(0).toLocaleUpperCase() + word.substring(1).toLocaleLowerCase());
    return capitalizedWords.join(' ');
}

console.log(capitalizarPalabras('hola mundo'));

const invertirCadena = (str) => str.split("").reverse().join("");

console.log(invertirCadena('JavaScript'));

const contarVocales = (str) => {
    const vowels = "aeiouáéíóú";
    let vowelsCount = 0;
    str = str.toLocaleLowerCase();

    for (let i = 0; i < str.length; i++) {
        if (vowels.includes(str.charAt(i))) {
            vowelsCount++;
        }
    }

    return vowelsCount;
}

console.log(contarVocales("Hello"));

const eliminarDuplicados = (str) => {
    let result = "";

    for (let i = 0; i < str.length; i++) {
        if (str.indexOf(str.charAt(i)) === i) {
            result += str.charAt(i);
        }
    }

    return result;
}

console.log(eliminarDuplicados("Programming"));
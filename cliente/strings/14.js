const crearPalabra = (char, num) => {
    result = char.repeat(num)
    return result.toLocaleUpperCase();
}

console.log(crearPalabra("a", 3));
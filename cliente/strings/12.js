const tieneLetra = (string, char) => {
    string = string.toLowerCase();
    char = char.toLowerCase();
    return string.indexOf(char);
}

console.log(tieneLetra("HOLA", "h"));
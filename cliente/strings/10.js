const generarNombre3 = (string1, string2, string3) => {
    let resultado = "";
    if (string1.length < 5 || string2.length < 5 || string3.length < 5) {
        resultado = "Error";
    } else {
        resultado = string1.substring(string1.length - 3, string1.length) +
        string2.substring(string2.length - 3, string2.length) + 
        string3.substring(string3.length - 3, string3.length);
    }

    return resultado;
}

console.log(generarNombre3("Saludo", "Buenas", "Adios"))
const generarNombre2 = (string1, string2, string3) => {
    let resultado = "";
    if (string1.length < 5 || string2.length < 5 || string3.length < 5) {
        resultado = "Error";
    } else {
        resultado = string1.charAt(string1.length - 1) +
        string2.charAt(string2.length - 1) + 
        string3.charAt(string3.length - 1);
    }

    return resultado;
}

console.log(generarNombre2("Saludo", "Buenas", "Adios"))
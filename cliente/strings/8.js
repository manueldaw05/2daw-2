const generarNombre = (string1, string2, string3) => {
    let resultado = "";
    if (string1.length < 5 || string2.length < 5 || string3.length < 5) {
        resultado = "Error";
    } else {
        resultado = string1.substring(0, 3) +
        string2.substring(0, 3) + 
        string3.substring(0, 3);
    }

    return resultado;
}

console.log(generarNombre("Saludo", "Buenas", "Adios"))
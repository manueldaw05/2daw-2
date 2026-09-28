const esPalindromo = (texto) => {
    let resultado  = texto.trim();
    resultado = texto.toLocaleLowerCase();
    resultado = texto.replace(/[^\p{L}\p{N}\s]/gu, '');

    let resultadoInvertido;
    let esPalindromo = false;


    for (let i = resultado.length; i > 0; i--) {
        resultadoInvertido = resultado.charAt(i);
    }

    if (resultado == resultadoInvertido) {
        esPalindromo == true;
    }

    return esPalindromo;
}
const devuelveMasLarga = (string1, string2) => {
    if (string1.length < string2.length) {
        return string2;
    } else if (string1.length > string2.length) {
        return string1;
    } else {
        return "Las cadenas de texto son iguales";
    }
};
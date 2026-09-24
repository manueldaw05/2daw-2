const toCase = (str) => {
    let newStr = str.toLocaleLowerCase() + "-";
    let firstChar = str.charAt(0); 
    firstChar = firstChar.toLocaleUpperCase();
    newStr += firstChar + str.substring(1, str.length);
    return newStr;
}

console.log(toCase("Hola"))
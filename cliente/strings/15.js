const addGuiones = (str) => {
    let newStr = "";

    for (let i = 0; i < str.length; i++) {
        newStr += str.charAt(i) + "-";
    }
    
    return newStr.substring(0, newStr.length - 1);
}

console.log(addGuiones("Hola"));
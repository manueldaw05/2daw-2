const firstWord = (str) => {
    let word = "";
    let count = 0;
    while (str.charAt(count) != " ") {
        word += str.charAt(count);
        count++;
    }

    return word;
}

console.log(firstWord("Hola Manuel"));
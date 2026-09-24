const indexOfIgnoreCase = (str1, str2) => {
    str1 = str1.toLocaleLowerCase();
    str2 = str2.toLocaleLowerCase();

    return str1.indexOf(str2);
}

console.log(indexOfIgnoreCase("bit", "IT"));
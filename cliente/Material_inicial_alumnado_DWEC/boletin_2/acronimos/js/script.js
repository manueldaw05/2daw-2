// Copia aquí las funciones de notas del boletín 1.
const phrases = [
    { phrase: "Hyper Text Markup Language" },
    { phrase: "Cascading Style Sheets" },
    { phrase: "Object Oriented Programming" }
];

function createAcronym(phrase) {
    return phrase
        .split(" ")
        .map(word => word[0].toUpperCase())
        .join("");
}

const phrasesWithAcronyms = phrases.map(item => ({
    ...item,
    acronym: createAcronym(item.phrase)
}));

console.log(phrasesWithAcronyms);

const filteredPhrases = phrasesWithAcronyms.filter(
    item => item.phrase.split(" ").length > 3
);

console.log(filteredPhrases);


const phraseInput = document.getElementById("phrase");
const submitButton = document.getElementById("submit");
const resetButton = document.getElementById("reset");
const results = document.getElementById("results");

function addResult(phrase) {
    const acronym = createAcronym(phrase);

    const li = document.createElement("li");

    li.textContent = `${phrase} → ${acronym}`;

    if (phrase.trim().split(/\s+/).length > 3) {
        li.classList.add("larga");
    }

    results.appendChild(li);
}

submitButton.addEventListener("click", () => {
    const phrase = phraseInput.value.trim();

    if (phrase === "") {
        return;
    }

    addResult(phrase);

    phraseInput.value = "";
    phraseInput.focus();
});

resetButton.addEventListener("click", () => {
    results.innerHTML = "";
    phraseInput.value = "";
    phraseInput.focus();
});
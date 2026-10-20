// TODO: leer frase, crear acrónimo, añadir un li a #results.
// TODO: marcar las frases de más de 3 palabras con classList.add("larga").
// TODO: limpiar lista y campo de texto.
const phraseInput = document.getElementById("phrase");
const generateBtn = document.getElementById("submit");
const resetBtn = document.getElementById("reset");
const results = document.getElementById("results");

// Generar acrónimo
generateBtn.addEventListener("click", () => {
    
    const phrase = phraseInput.value.trim();

    if (phrase === "") {
        return;
    }

    const words = phrase.split(/\s+/);

    const acronym = words
        .map(word => word[0].toUpperCase())
        .join("");

    const li = document.createElement("li");
    li.textContent = `${phrase} → ${acronym}`;

    // Destacar frases largas
    if (words.length > 3) {
        li.classList.add("long-phrase");
    }

    results.appendChild(li);

    phraseInput.value = "";
    phraseInput.focus();
});

// Limpiar lista y formulario
resetBtn.addEventListener("click", () => {
    results.innerHTML = "";
    phraseInput.value = "";
    phraseInput.focus();
});
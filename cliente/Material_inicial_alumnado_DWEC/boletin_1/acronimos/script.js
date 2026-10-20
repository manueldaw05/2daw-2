const phrases = [
  { phrase: 'Hyper Text Markup Language' },
  { phrase: 'Cascading Style Sheets' },
  { phrase: 'Object Oriented Programming' }
];

function createAcronym(phrase) {
  return phrase.split(" ").map(word => word[0].toUpperCase()).join("");
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

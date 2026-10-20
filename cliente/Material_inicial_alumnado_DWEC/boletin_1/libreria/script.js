const bookStore = {books:[{title:'1984',author:'George Orwell',price:15,category:'Fiction'},{title:'Sapiens',author:'Yuval Noah Harari',price:20,category:'Non-fiction'}]};
// TODO: addBook, getBooksByCategory, reduce, filter, sort.
const addBook = ( title, author, price, category ) => 
    bookStore.books
        .push({
        title: title,
        author: author,
        price: price,
        category: category
    });

addBook("Hola", "hola", 1, "si");
console.log(bookStore);

// Copia aquí las funciones de librería del boletín 1.
// TODO: representar tabla, añadir, eliminar, filtrar y ordenar.
// TODO: actualizar opciones del selector si aparecen nuevas categorías.
const bookStore = [
    {
        title: "El Quijote",
        author: "Miguel de Cervantes",
        price: 25,
        category: "Fiction"
    },
    {
        title: "Sapiens",
        author: "Yuval Noah Harari",
        price: 20,
        category: "Non-fiction"
    },
    {
        title: "1984",
        author: "George Orwell",
        price: 15,
        category: "Fiction"
    }
];

const booksTable = document.getElementById("books");
const addBookForm = document.getElementById("addBook");
const categoryFilter = document.getElementById("categoryFilter");

function renderBooks(books = bookStore) {
    booksTable.innerHTML = "";

    books.forEach((book, index) => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td>${book.title}</td>
            <td>${book.author}</td>
            <td>${book.price.toFixed(2)} €</td>
            <td>${book.category}</td>
            <td>
                <button type="button">Eliminar</button>
            </td>
        `;

        const deleteButton = row.querySelector("button");

        deleteButton.addEventListener("click", () => {
            const originalIndex = bookStore.indexOf(book);

            if (originalIndex !== -1) {
                bookStore.splice(originalIndex, 1);
                applyFilter();
            }
        });

        booksTable.appendChild(row);
    });
}

function applyFilter() {
    const category = categoryFilter.value;

    if (category === "") {
        renderBooks();
    } else {
        const filteredBooks = bookStore.filter(
            book => book.category === category
        );

        renderBooks(filteredBooks);
    }
}

addBookForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const title = document.getElementById("title").value;
    const author = document.getElementById("author").value;
    const price = Number(document.getElementById("price").value);
    const category = document.getElementById("category").value;

    bookStore.push({
        title,
        author,
        price,
        category
    });

    applyFilter();
    addBookForm.reset();
});

categoryFilter.addEventListener("change", applyFilter);

document.getElementById("asc").addEventListener("click", () => {
    const sortedBooks = [...bookStore].sort(
        (a, b) => a.price - b.price
    );

    renderBooks(sortedBooks);
});

document.getElementById("desc").addEventListener("click", () => {
    const sortedBooks = [...bookStore].sort(
        (a, b) => b.price - a.price
    );

    renderBooks(sortedBooks);
});

renderBooks();
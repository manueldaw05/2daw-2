// Copia aquí las funciones de notas del boletín 1.
const bookStore = {
    books: [
        {
            title: "1984",
            author: "George Orwell",
            price: 15,
            category: "Fiction"
        },
        {
            title: "Sapiens",
            author: "Yuval Noah Harari",
            price: 20,
            category: "Non-fiction"
        }
    ]
};

const addBook = (title, author, price, category) =>
    bookStore.books.push({
        title,
        author,
        price,
        category
    });

const removeBook = (title) => {
    bookStore.books = bookStore.books.filter(
        book => book.title !== title
    );
};

const getBooksByCategory = (category) => {
    if (category === "") {
        return bookStore.books;
    }

    return bookStore.books.filter(
        book => book.category === category
    );
};


const booksTable = document.getElementById("books");
const addBookForm = document.getElementById("addBook");
const categoryFilter = document.getElementById("categoryFilter");
const ascButton = document.getElementById("asc");
const descButton = document.getElementById("desc");

let currentBooks = [...bookStore.books];

function updateCategories() {
    const currentValue = categoryFilter.value;

    categoryFilter.innerHTML =
        '<option value="">Todas</option>';

    const categories = [
        ...new Set(
            bookStore.books.map(book => book.category)
        )
    ];

    categories.forEach(category => {
        const option = document.createElement("option");
        option.value = category;
        option.textContent = category;
        categoryFilter.appendChild(option);
    });

    categoryFilter.value = currentValue;
}

function renderBooks(books) {
    booksTable.innerHTML = "";

    books.forEach(book => {
        const tr = document.createElement("tr");

        const tdTitle = document.createElement("td");
        tdTitle.textContent = book.title;

        const tdAuthor = document.createElement("td");
        tdAuthor.textContent = book.author;

        const tdPrice = document.createElement("td");
        tdPrice.textContent = book.price + " €";

        const tdCategory = document.createElement("td");
        tdCategory.textContent = book.category;

        const tdActions = document.createElement("td");

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Eliminar";

        deleteButton.addEventListener("click", () => {
            removeBook(book.title);

            currentBooks = getBooksByCategory(
                categoryFilter.value
            );

            renderBooks(currentBooks);
            updateCategories();
        });

        tdActions.appendChild(deleteButton);

        tr.appendChild(tdTitle);
        tr.appendChild(tdAuthor);
        tr.appendChild(tdPrice);
        tr.appendChild(tdCategory);
        tr.appendChild(tdActions);

        booksTable.appendChild(tr);
    });
}

addBookForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const title = document.getElementById("title").value;
    const author = document.getElementById("author").value;
    const price = document.getElementById("price").value;
    const category =
        document.getElementById("category").value;

    addBook(title, author, price, category);

    currentBooks = getBooksByCategory(
        categoryFilter.value
    );

    renderBooks(currentBooks);
    updateCategories();

    addBookForm.reset();
});

categoryFilter.addEventListener("change", () => {
    currentBooks = getBooksByCategory(
        categoryFilter.value
    );

    renderBooks(currentBooks);
});

ascButton.addEventListener("click", () => {
    currentBooks.sort(
        (a, b) => a.price - b.price
    );

    renderBooks(currentBooks);
});

descButton.addEventListener("click", () => {
    currentBooks.sort(
        (a, b) => b.price - a.price
    );

    renderBooks(currentBooks);
});

updateCategories();
renderBooks(bookStore.books);
// Copia aquí las funciones de inventario del boletín 1.
const inventory = {
  items: [
    { name: "Laptop", quantity: 5, price: 1200 },
    { name: "Mouse", quantity: 25, price: 20 },
    { name: "Keyboard", quantity: 15, price: 50 }
  ],
  totalItems: 0
};

const updateTotalItems = () => {
  inventory.totalItems = inventory.items.reduce(
    (total, item) => total + item.quantity,
    0
  );
};

const addItem = (name, quantity, price) => {
  inventory.items.push({ name, quantity, price });
  updateTotalItems();
};

const removeItem = (itemName) => {
  inventory.items = inventory.items.filter(
    item => item.name !== itemName
  );
  updateTotalItems();
};

const moreThan50 = ({ items }) =>
  console.log(
    items
      .filter(item => item.price > 50)
      .map(item => item.name)
  );

const countItemsWithO = ({ items }) => {
  const count = items.filter(item =>
    item.name.toLowerCase().includes("o")
  ).length;

  console.log(count);
};


const tbody = document.getElementById("items");

const addRow = (item) => {
  const tr = document.createElement("tr");

  if (item.price > 50) {
    tr.classList.add("caro");
  }

  const tdName = document.createElement("td");
  tdName.textContent = item.name;

  const tdQuantity = document.createElement("td");
  tdQuantity.textContent = item.quantity;

  const tdPrice = document.createElement("td");
  tdPrice.textContent = `${item.price} €`;

  const tdActions = document.createElement("td");

  const deleteBtn = document.createElement("button");
  deleteBtn.textContent = "Eliminar";

  deleteBtn.addEventListener("click", () => {
    removeItem(item.name);
    renderTable();
  });

  tdActions.appendChild(deleteBtn);

  tr.appendChild(tdName);
  tr.appendChild(tdQuantity);
  tr.appendChild(tdPrice);
  tr.appendChild(tdActions);

  tbody.appendChild(tr);
};

const renderTable = () => {
  tbody.innerHTML = "";

  inventory.items.forEach(item => {
    addRow(item);
  });
};

const form = document.getElementById("addProduct");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const quantity = document.getElementById("quantity").value;
  const price = document.getElementById("price").value;

  addItem(name, quantity, price);

  renderTable();

  form.reset();
});

updateTotalItems();
renderTable();
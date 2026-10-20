const inventory = { items: [{name:'Laptop',quantity:5,price:1200},{name:'Mouse',quantity:25,price:20},{name:'Keyboard',quantity:15,price:50}], totalItems:0 };

const updateTotalItems = () => {
  inventory.totalItems = inventory.items.reduce((total, item) => total + item.quantity, 0);
};

const addItem = (name, quantity, price) => {
  inventory.items.push({ name, quantity, price });
  updateTotalItems();
};

const removeItem = (itemName) => {
  inventory.items = inventory.items.filter(item => item.name !== itemName);
  updateTotalItems();
};

const moreThan50 = ({ items }) =>
  console.log(items.filter(item => item.price > 50).map(item => item.name)
  );

const countItemsWithO = ({ items }) => {
  const count = items.filter(item => item.name.toLowerCase().includes("o")).length;
  console.log(count);
};

addItem("Hola", 1, 3);
console.log(inventory);

removeItem("Keyboard");
console.log(inventory);

updateTotalItems();
console.log(inventory);

countItemsWithO(inventory);
console.log(inventory);

moreThan50(inventory);
console.log(inventory);
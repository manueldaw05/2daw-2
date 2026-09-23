const product = { name: "Apples", id: 1, specs: {color: "red"} };
const { name, specs: { color } } = product;

//console.log("Product name: ", name, "Color: ", color);

function nameAndColor({name, specs: {color}}) {
    console.log("Product name: ", name, "Color: ", color);
}

nameAndColor(product);

const sumar = (a, b) => a + b;
const sumar2 = (a, b) => {
    return a + b;
}

const products = [{id: 1, task: "Buy a pen", status: "Done"}, {id: 2, task: "Buy a pencilcase", status: "Pending"}];
const pendingTasks = products.filter(product => product.status == "Pending");

console.log(products);
console.log(pendingTasks);

const completedTasks = products.map(product => ({ ...product, status: "Done" }));
const producto = {
    nombre: "Manzana",
    precio: 0.5,
    categoria: "Alimentos"
}

const informacionProducto = (obj) => console.log(`El nombre del producto es ${obj.nombre}, cuesta ${obj.precio}€ y pertenece a la categoría de ${obj.categoria}.`);

informacionProducto(producto);
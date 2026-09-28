const estadoApp = {
usuario: "Admin",
carrito: [
    { id: 1, articulo: "Ratón", cantidad: 1 },
    { id: 2, articulo: "Teclado", cantidad: 1 }
],
total: 50
};

const nuevoEstadoApp = {
    ...estadoApp,
    total: 80,
    carrito: estadoApp.carrito.map(articulo => {
        if (articulo.articulo == "Teclado") {
            return {...articulo,
            cantidad: 2
            }
        };

        return articulo;
    })
}

console.log(JSON.stringify(nuevoEstadoApp, null, 2));
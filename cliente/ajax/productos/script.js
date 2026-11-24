// cargarProductos()	GET	Obtener productos
// guardarProducto(producto)	POST	Crear producto
// modificarPrecio(id, precio)	PATCH	Modificar precio
// eliminarProducto(id)	DELETE	Eliminar producto

// Cada función deberá:
// 1. Declararse mediante async.
// 2. Utilizar await fetch().
// 3. Comprobar respuesta.ok.
// 4. Procesar el JSON cuando corresponda.
// 5. Devolver el resultado para que pueda utilizarlo otra función.
// En los eventos de los formularios y botones, utilizarán try...catch para gestionar los posibles errores.

/**
 * Carga los productos en JSON Server.
 * @returns {Promise<Object>} Promesa con los productos.
 */
async function cargarProducto() {
    const respuesta = await fetch(
        "http://localhost:3000/productos",
        {
            method:"GET",

            headers: {
                "Content-Type": "application/json"
            }
        }
    )

    if (!respuesta.ok) {
        throw new Error("Error HTTP: " + respuesta.status);
    }

    const productos = await respuesta.json();

    return productos;
}

/**
 * Guarda un producto en JSON Server.
 * @param {Object} producto - Producto que queremos crear.
 * @returns {Promise<Object>} Promesa con el producto creado.
 */
async function guardarProducto(producto) {

    const respuesta = await fetch(
        "http://localhost:3000/productos",
        {
            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify(producto)
        }
    );

    if (!respuesta.ok) {
        throw new Error("Error HTTP: " + respuesta.status);
    }

    const productoCreado = await respuesta.json();

    return productoCreado;
}

async function ejecutarEjemplo() {

    const producto = {
        nombre: "Monitor",
        precio: 150
    };

    try {

        const nuevoProducto = await guardarProducto(producto);

        console.log("Producto creado:", nuevoProducto);

    } catch (error) {

        console.error("Error:", error.message);

    }

}

ejecutarEjemplo();
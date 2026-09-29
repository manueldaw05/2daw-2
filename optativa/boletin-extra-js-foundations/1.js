const respuestaAPI = {
    status: 200,
    data: {
        usuario: {
            id: 105,
            nombre: "Sara",
            contacto: {
                email: "sara@ejemplo.com"
                // Nota: falta el teléfono
            }
        }
    }
};

const { data: { usuario: { nombre, contacto: { email, telefono: "No proporcionado" } } } } = nuevaRespuestaAPI;

console.log(nuevaRespuestaAPI);

/*
product = {
    id: 1,
    color: "Red",
    }

    //Si tenemos dos objetos en los que una propiedad está en alguno de los dos,
    //podemos escribir 'atributo = valor' para crearle el atributo y asignarle valor en caso de que no lo tenga.

const { id, color, size = "Not available" } = newProduct
*/

/*
//Para cambiar el nombre de un atributo, en caso de que lo necesite, puedo hacer { nombreAtributo : nuevoNombreAtributo} = objeto;
*/
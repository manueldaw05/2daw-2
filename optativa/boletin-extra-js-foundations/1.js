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

const { data: { usuario: { nombre, contacto: { email, telefono = "No proporcionado" } } } } = respuestaAPI;

console.log(`Nombre: ${nombre}\nEmail: ${email}\nTeléfono: ${telefono}`);
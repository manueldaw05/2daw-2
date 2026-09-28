const datosUsuario = {
    id: 99,
    nombre: "Elena",
    preferencias: {
    idioma: "es",
    tema: "oscuro"
    },
    suscripcion: "Premium"
};

const saludarUsuario = ({ nombre, preferencias: { tema } }) => `Hola ${nombre}, tu tema elegido es ${tema}`;

console.log(saludarUsuario(datosUsuario));
const estadoRestaurante = {
    nombre: "El Buen Sabor",
    abierto: true,
    menu: [
        { id: 1, plato: "Pizza Margarita", disponible: true },
        { id: 2, plato: "Pasta Carbonara", disponible: false },
        { id: 3, plato: "Tiramisú", disponible: true }
    ]
}

const nuevoEstadoRestaurante = {
  ...estadoRestaurante,
  menu: estadoRestaurante.menu.map(plato =>
    plato.plato === "Pasta Carbonara"
      ? { ...plato, disponible: true }
      : plato
  )
};

console.log(nuevoEstadoRestaurante);
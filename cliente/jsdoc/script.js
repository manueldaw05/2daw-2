//@ts-check

/**
 * @typedef {Object} Configuracion
 * @property {string} app
 * @property {string} version
 * @property {boolean} debug
 */

/** @type {Configuracion} */
const configuracion = {
  app: "MiAplicacion",
  version: "1.0.0",
  debug: true
};

class Usuario {
  /**
   * @param {number} id
   * @param {string} nombre
   * @param {string} email
   */
  constructor(id, nombre, email) {
    this.id = id;
    this.nombre = nombre;
    this.email = email;
  }

  /**
   * @returns {string}
   */
  saludar() {
    return `Hola, soy ${this.nombre}`;
  }
}

/**
 * @typedef {Object} Estadisticas
 * @property {number} suma
 * @property {number} promedio
 * @property {number} maximo
 * @property {number} minimo
 */

/**
 * Devuelve estadísticas calculadas a partir de una lista de números.
 * @param {number[]} numeros
 * @returns {Estadisticas}
 */
function calcularEstadisticas(numeros) {
  const suma = numeros.reduce((acc, num) => acc + num, 0);

  return {
    suma,
    promedio: suma / numeros.length,
    maximo: Math.max(...numeros),
    minimo: Math.min(...numeros)
  };
}

/** @type {Usuario[]} */
const usuarios = [
  new Usuario(1, "Ana", "ana@example.com"),
  new Usuario(2, "Luis", "luis@example.com")
];

/** @type {Estadisticas} */
const estadisticas = calcularEstadisticas([10, 20, 30, 40, 50]);

/** @type {Usuario | undefined} */
const usuarioActivo = usuarios.find(usuario => usuario.id === 1);

console.log(configuracion);

if (usuarioActivo) {
  console.log(usuarioActivo.saludar());
}

console.log(estadisticas);
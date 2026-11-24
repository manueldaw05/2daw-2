const SERVER = "https://jsonplaceholder.typicode.com";

const formulario = document.getElementById("form-show");
const tbody = document.getElementById("tabla-posts");
const contador = document.getElementById("num-posts");
const mensaje = document.getElementById("mensaje");

/**
 * Obtiene las publicaciones de un usuario.
 * @param {string|number} idUsuario - Identificador del usuario.
 * @returns {Promise<Array>} Promesa con las publicaciones.
 */
function getPosts(idUsuario) {

    return new Promise(function (resolve, reject) {

        const xhr = new XMLHttpRequest();

        const url = SERVER + "/posts?userId=" +
            encodeURIComponent(idUsuario);

        xhr.open("GET", url);

        xhr.addEventListener("load", function () {

            if (xhr.status === 200) {

                try {
                    const publicaciones = JSON.parse(xhr.responseText);

                    resolve(publicaciones);

                } catch (error) {
                    reject(error);
                }

            } else {
                reject(
                    "Error HTTP: " + xhr.status +
                    " (" + xhr.statusText + ")"
                );
            }

        });

        xhr.addEventListener("error", function () {
            reject("Error de conexión con el servidor");
        });

        xhr.send();

    });
}

/**
 * Muestra las publicaciones recibidas en una tabla.
 * @param {Array} publicaciones - Publicaciones recibidas.
 */
function mostrarPosts(publicaciones) {

    tbody.replaceChildren();

    publicaciones.forEach(function (post) {

        const fila = document.createElement("tr");

        const valores = [
            post.userId,
            post.id,
            post.title,
            post.body
        ];

        valores.forEach(function (valor) {

            const celda = document.createElement("td");

            celda.textContent = valor;

            fila.appendChild(celda);
        });

        tbody.appendChild(fila);
    });

    contador.textContent = publicaciones.length;
}

/**
 * Gestiona el envío del formulario.
 */
formulario.addEventListener("submit", function (event) {

    event.preventDefault();

    const idUsuario =
        document.getElementById("id-usuario").value;

    if (idUsuario === "" || Number(idUsuario) < 1) {
        mensaje.textContent = "Introduce un identificador válido";
        return;
    }

    mensaje.textContent = "Cargando publicaciones...";

    getPosts(idUsuario)
        .then(function (publicaciones) {

            mostrarPosts(publicaciones);

            mensaje.textContent =
                "Consulta realizada correctamente";

        })
        .catch(function (error) {

            console.error(error);

            mensaje.textContent = "Error: " + error;

            tbody.replaceChildren();
            contador.textContent = "0";
        });

});
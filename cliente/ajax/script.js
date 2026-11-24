const SERVER = "https://jsonplaceholder.typicode.com";

const formulario = document.getElementById("form-show");

const tbody = document.getElementById("tabla-posts");

const contador = document.getElementById("num-posts");

const titulosBtn = document.getElementById("mostrar-titulos");

formulario.addEventListener("submit", function (event) {

    event.preventDefault();

    const idUsuario = document.getElementById("id-usuario").value;

    if (idUsuario === "" || Number(idUsuario) < 1) {
        alert("Debes introducir un identificador válido");
        return;
    }

    getPosts(idUsuario, mostrarPosts);

});

titulosBtn.addEventListener("click", function (event) {
    event.preventDefault();

    const idUsuario = document.getElementById("id-usuario").value;

    if (idUsuario === "" || Number(idUsuario) < 1) {
        alert("Debes introducir un identificador válido");
        return;
    }

    getPosts(idUsuario, mostrarTitulos);
})

/**
 * Consulta las publicaciones de un usuario.
 * @param {string} idUsuario - Identificador del usuario.
 * @param {Function} callback - Función que procesará los datos.
 */
function getPosts(idUsuario, callback) {

    const xhr = new XMLHttpRequest();

    xhr.open(
        "GET",
        SERVER + "/posts?userId=" + encodeURIComponent(idUsuario)
    );

    xhr.addEventListener("load", function () {

        if (xhr.status === 200) {

            const publicaciones = JSON.parse(xhr.responseText);

            callback(publicaciones);

        } else {

            console.error("Error HTTP:", xhr.status);

            tbody.replaceChildren();
            contador.textContent = "0";

        }

    });

    xhr.addEventListener("error", function () {

        console.error("Error de conexión");

        tbody.replaceChildren();
        contador.textContent = "0";

    });

    xhr.send();
}

/**
 * Muestra las publicaciones en una tabla.
 * @param {Array} publicaciones - Array de publicaciones.
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

function mostrarTitulos(publicaciones) {
    tbody.replaceChildren();

    publicaciones.forEach(function (post) {

        const fila = document.createElement("tr");

        const valores = [
            post.userId,
            post.id,
            post.title,
            ''
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
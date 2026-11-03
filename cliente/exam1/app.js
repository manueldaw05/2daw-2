let tasks = [
    { id: 1, title: "Study JavaScript", description: "Review arrays and objects", priority: "ALTA", isCompleted: false },
    { id: 2, title: "Practice DOM", description: "Create HTML elements", priority: "MEDIA", isCompleted: false },
    { id: 3, title: "Review events", description: "Practice click and submit", priority: "BAJA", isCompleted: true }
];

const taskList = document.getElementById('task-list');
const taskForm = document.getElementById('task-form');
const submitBtn = document.querySelector('button');

submitBtn.addEventListener('click', addTask());

renderTasks();
localStorage.setItem('tasks', '');
loadTasks();


/**
 * Muestra las tareas
 * @returns {void}
 */
function renderTasks() {
    taskList.innerHTML = "";

    tasks.forEach((task) => {
        const taskLi = document.createElement('li');
        taskLi.innerText = `Título: ${task.title}, Descripción: ${task.description}, Prioridad: ${task.priority}, Completada: ${task.isCompleted}`
        taskList.appendChild(taskLi);
    })
}

/**
 * Añade una tarea
 * @returns {void}
 */
function addTask() {
    const title = document.getElementById('title');
    const description = document.getElementById('description');
    const priority = document.getElementById('priority');
    const id = 10

    const task = {
        id: id,
        title: title.textContent,
        description: description.innerText,
        priority: priority.innerText,
        isCompleted: false
    }

    tasks.push(task)

    renderTasks();
    saveTasks();
}

/**
 * Borra una tarea
 * @param {number} id ID de la tarea que se borrará
 * @returns {void}
 */
function deleteTask(id) {
    saveTasks();
}

/**
 * Cambia el estado de completado de una tarea
 * @param {number} id ID de la tarea a la que se le cambiará el estado de completado
 * @returns {void}
 */
function toggleTask(id) {
    saveTasks();
}

/**
 * Busca la tarea por título
 * @param {string} text Texto introducido en la barra de búsqueda
 * @returns {array<Object>} Lista con las tareas que coinciden con el título
 */
function searchTasks(text) {

}

/**
 * Ordena las tareas por prioridad
 * @returns {void}
 */
function sortTasksByPriority() {
}

/**
 * Guarda las tareas en localStorage
 * @returns {void}
 */
function saveTasks() {
    localStorage.setItem('tasks', JSON.stringify(tasks));
}

/**
 * Carga las tareas de localStorage
 * @returns {void}
 */
function loadTasks() {
    if (localStorage.getItem('tasks') === '') {
        localStorage.setItem('tasks', JSON.stringify(tasks));
        tasks = JSON.parse(localStorage.getItem('tasks'));
    } else {
        tasks = JSON.parse(localStorage.getItem('tasks'));
    }
}

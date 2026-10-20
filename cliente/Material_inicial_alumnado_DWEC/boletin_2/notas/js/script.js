// Copia aquí las funciones de notas del boletín 1.
// TODO: representar alumnos y notas en #students.
// TODO: alta de alumno, botón/formulario para añadir nota, media y clase sobresaliente.
const gradebook = {
    Ana: [8, 9, 10],
    Luis: [6, 7, 8],
    Marta: [10, 9, 9]
};

const studentsList = document.getElementById("students");
const addStudentForm = document.getElementById("addStudent");

function calculateAverage(grades) {
    if (grades.length === 0) {
        return 0;
    }

    const sum = grades.reduce((total, grade) => total + grade, 0);
    return (sum / grades.length).toFixed(2);
}

function renderStudents() {
    studentsList.innerHTML = "";

    for (const student in gradebook) {
        const average = calculateAverage(gradebook[student]);

        const li = document.createElement("li");

        if (average > 8) {
            li.classList.add("outstanding");
        }

        li.innerHTML = `
            <strong>${student}</strong><br>
            Notas: ${gradebook[student].join(", ")}<br>
            Promedio: ${average}<br>
            <button type="button">Añadir nota</button>
        `;

        const addGradeButton = li.querySelector("button");

        addGradeButton.addEventListener("click", () => {
            const newGrade = Number(
                prompt(`Introduce una nota para ${student}`)
            );

            if (!isNaN(newGrade) && newGrade >= 0 && newGrade <= 10) {
                gradebook[student].push(newGrade);
                renderStudents();
            }
        });

        studentsList.appendChild(li);
    }
}

addStudentForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const studentName =
        document.getElementById("studentName").value;

    if (!gradebook[studentName]) {
        gradebook[studentName] = [];
    }

    renderStudents();
    addStudentForm.reset();
});

renderStudents();
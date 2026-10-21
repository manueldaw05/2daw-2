// Copia aquí las funciones de notas del boletín 1.
const gradebook = {
    students: [
        {
            name: 'Ana',
            grades: [8, 7, 9],
            average: 0
        },
        {
            name: 'Luis',
            grades: [6, 8, 6],
            average: 0
        },
        {
            name: 'Maria',
            grades: [9, 10, 9],
            average: 0
        }
    ]
};

const calculateAverage = ({ students }) => {
    students.forEach(student => {
        const sum = student.grades.reduce(
            (total, grade) => total + grade,
            0
        );

        student.average = student.grades.length
            ? sum / student.grades.length
            : 0;
    });
};

const addStudent = (name) => {
    gradebook.students.push({
        name,
        grades: [],
        average: 0
    });
};

const addGrade = (studentName, grade) => {
    const student = gradebook.students.find(
        student => student.name === studentName
    );

    student.grades.push(grade);

    const sum = student.grades.reduce(
        (total, g) => total + g,
        0
    );

    student.average = sum / student.grades.length;
};


const studentsList = document.getElementById("students");
const addStudentForm = document.getElementById("addStudent");

const renderStudents = () => {
    studentsList.innerHTML = "";

    calculateAverage(gradebook);

    gradebook.students.forEach(student => {
        const li = document.createElement("li");

        if (student.average > 8) {
            li.classList.add("outstanding");
        }

        const name = document.createElement("strong");
        name.textContent = student.name;

        const grades = document.createElement("p");
        grades.textContent =
            "Notas: " + student.grades.join(", ");

        const average = document.createElement("p");
        average.textContent =
            "Promedio: " + student.average.toFixed(2);

        const button = document.createElement("button");
        button.textContent = "Añadir nota";

        button.addEventListener("click", () => {
            const grade = 
                prompt(
                    `Introduce una nota para ${student.name}`
                );

            if (
                grade >= 0 &&
                grade <= 10
            ) {
                addGrade(student.name, grade);
                renderStudents();
            }
        });

        li.appendChild(name);
        li.appendChild(grades);
        li.appendChild(average);
        li.appendChild(button);

        studentsList.appendChild(li);
    });
};

addStudentForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const studentName =
        document.getElementById("studentName").value.trim();

    if (
        studentName &&
        !gradebook.students.some(
            student => student.name === studentName
        )
    ) {
        addStudent(studentName);
        renderStudents();
    }

    addStudentForm.reset();
});

renderStudents();
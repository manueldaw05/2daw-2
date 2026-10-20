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
        const sum = student.grades.reduce((total, grade) => total + grade, 0);
        student.average = student.grades.length ? sum / student.grades.length : 0;
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
    const student = gradebook.students.find(student => student.name === studentName);

    student.grades.push(grade);

    const sum = student.grades.reduce((total, g) => total + g, 0);
    student.average = sum / student.grades.length;
};

calculateAverage(gradebook);

addStudent('Carlos');
addGrade('Carlos', 8);
addGrade('Carlos', 9);

console.log(gradebook);
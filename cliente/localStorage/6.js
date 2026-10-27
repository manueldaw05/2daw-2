const userForm = document.getElementById('userForm');
const userList = document.getElementById('userList');

let users = JSON.parse(localStorage.getItem('users')) || [];

renderUsers();

userForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const user = {
        name: document.getElementById('name').value,
        address: document.getElementById('address').value,
        email: document.getElementById('email').value
    };

    users.push(user);
    saveUsers();
    renderUsers();

    userForm.reset();
});

function saveUsers() {
    localStorage.setItem('users', JSON.stringify(users));
}

function renderUsers() {
    userList.innerHTML = '';

    users.forEach((user, index) => {
        const li = document.createElement('li');

        li.innerHTML = `
            <strong>${user.name}</strong><br>
            ${user.address}<br>
            ${user.email}<br>
        `;

        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'Borrar';

        removeBtn.addEventListener('click', () => {
            users.splice(index, 1);
            saveUsers();
            renderUsers();
        });

        li.appendChild(document.createElement('br'));
        li.appendChild(removeBtn);

        userList.appendChild(li);
    });
}
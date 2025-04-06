document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('edit-password');
    const form = document.querySelector('form');

    form.addEventListener('submit', (e) => {
        const password = passwordInput.value;

        if (password && !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/.test(password)) {
            e.preventDefault();
            alert('Le mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.');
        }
    });
});

function openEditForm(id, username, isAdmin) {
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-username').value = username;
    document.getElementById('edit-admin').checked = isAdmin;
    document.getElementById('edit-password').value = '';
    document.getElementById('edit-form').style.display = 'block';
}

function closeEditForm() {
    document.getElementById('edit-form').style.display = 'none';
}

function confirmDelete(userId, username) {
    if (confirm(`Êtes-vous sûr de vouloir supprimer l'utilisateur "${username}" ? Cette action est irréversible.`)) {
        // Rediriger vers une URL pour supprimer l'utilisateur
        window.location.href = `admin.php?delete-user=${userId}`;
    }
}
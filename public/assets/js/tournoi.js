// Afficher/Masquer le formulaire d'ajout de membre
document.getElementById('add-member-btn').addEventListener('click', function () {
    const form = document.getElementById('add-member-form');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
});

// Désactiver les champs pour un nouveau membre si un membre existant est sélectionné
document.getElementById('existing_member_id').addEventListener('change', function () {
    const nameField = document.getElementById('name');
    const dateField = document.getElementById('date_naissance');

    if (this.value) {
        nameField.disabled = true;
        dateField.disabled = true;
    } else {
        nameField.disabled = false;
        dateField.disabled = false;
    }
});

// Désactiver la liste des membres existants si un nouveau membre est saisi
document.getElementById('name').addEventListener('input', function () {
    const existingMemberField = document.getElementById('existing_member_id');

    if (this.value) {
        existingMemberField.disabled = true;
    } else {
        existingMemberField.disabled = false;
    }
});
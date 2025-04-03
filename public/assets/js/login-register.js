$(document).ready(function () {
    $('#password').on('input', function () {
        const password = $(this).val();

        // Vérifier les critères du mot de passe
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/;

        // Supprimer les anciens messages d'erreur
        $('.error-message').remove();

        if (!passwordRegex.test(password)) {
            // Ajouter un message d'erreur sous le formulaire
            const errorMessage = $('<div class="error-message">Le mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</div>');
            $('#registerForm').prepend(errorMessage);

            // Désactiver le bouton de soumission
            $('#registerForm button[type="submit"]').prop('disabled', true);
        } else {
            // Activer le bouton de soumission si le mot de passe est valide
            $('#registerForm button[type="submit"]').prop('disabled', false);
            // Cacher le message d'erreur
            $('.error-message').fadeOut(300, function () {
                $(this).remove();
            });
        }
    });
});
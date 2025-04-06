<?php
require_once 'controllers/adminController.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
    <?php include 'assets/inc/header.inc.php'; ?>
    <div class="content">
        <h1>Liste des utilisateurs</h1>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message" style="color: red; margin-bottom: 15px;">
                <?= htmlspecialchars($_SESSION['error']); ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message" style="color: green; margin-bottom: 15px;">
                <?= htmlspecialchars($_SESSION['success']); ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (!empty($users)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Numéro d'utilisateur</th>
                        <th>Nom</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td style="text-align: center;">
                                <input type="checkbox" <?= $user['admin'] ? 'checked' : '' ?> disabled>
                            </td>
                            <td>
                                <!-- Bouton Modifier avec une icône -->
                                <button class="edit-icon" onclick="openEditForm(<?= $user['id'] ?>, '<?= htmlspecialchars($user['username']) ?>', <?= $user['admin'] ? 'true' : 'false' ?>)">
                                    ✏️
                                </button>
                                <!-- Icône de suppression -->
                                <span class="delete-icon" onclick="confirmDelete(<?= $user['id'] ?>, '<?= htmlspecialchars($user['username']) ?>')">❌</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php endif; ?>
    </div>

    <!-- Formulaire d'édition (caché par défaut) -->
    <div id="edit-form" style="display: none;">
        <h2>Modifier un utilisateur</h2>
        <form method="POST" action="admin.php">
            <input type="hidden" name="id" id="edit-id">
            <div>
                <label for="edit-username">Nom :</label>
                <input type="text" name="username" id="edit-username" required>
            </div>
            <div>
                <label for="edit-admin">Admin :</label>
                <input type="checkbox" name="admin" id="edit-admin">
            </div>
            <div>
                <label for="edit-password">Mot de passe :</label>
                <input type="password" name="password" id="edit-password" placeholder="Laissez vide pour ne pas changer">
                <small class="password-criteria">
                    Le mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.
                </small>
            </div>
            <button type="submit" name="update-user">Enregistrer</button>
            <button type="button" onclick="closeEditForm()">Annuler</button>
        </form>
    </div>
    <?php include 'assets/inc/footer.inc.php'; ?>
    <script src="assets/js/admin.js"></script>
</body>

</html>
<?php
require_once(__DIR__ . '/controllers/tournoiController.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Tournoi</title>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body>
    <?php include 'assets/inc/header.inc.php'; ?>

    <main>
        <div class="container">
            <h1>Gestion du Tournoi</h1>

            <!-- Formulaire pour ajouter un membre -->
            <button id="add-member-btn">+ Ajouter un membre</button>
            <form id="add-member-form" method="POST" style="display: none; margin-top: 20px;">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>

                <label for="date_naissance">Date de naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" required>

                <label for="etape_id">Étape :</label>
                <select id="etape_id" name="etape_id" required>
                    <option value="1">Étape 1</option>
                    <option value="2">Étape 2</option>
                    <option value="3">Étape 3</option>
                    <!-- Ajoutez d'autres étapes ici -->
                </select>

                <label for="temps">Temps (hh:mm:ss) :</label>
                <input type="text" id="temps" name="temps" placeholder="00:00:00" required>

                <button type="submit">Ajouter</button>
            </form>

            <!-- Classement -->
            <h2>Classement pour l'Étape <?php echo $etape_id; ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Temps</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ranking)): ?>
                        <?php foreach ($ranking as $index => $rank): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($rank['name']); ?></td>
                                <td><?php echo $rank['date_naissance']; ?></td>
                                <td><?php echo $rank['temps']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Aucun résultat pour cette étape.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        // Afficher/Masquer le formulaire d'ajout de membre
        document.getElementById('add-member-btn').addEventListener('click', function () {
            const form = document.getElementById('add-member-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>
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

            <!-- Formulaire pour choisir une étape -->
            <form method="GET" action="tournoi.php">
                <label for="etape_id">Choisir une étape :</label>
                <select id="etape_id" name="etape_id" required>
                    <?php foreach ($etapes as $etape): ?>
                        <option value="<?php echo htmlspecialchars($etape['id']); ?>" <?php echo (isset($_GET['etape_id']) && $_GET['etape_id'] == $etape['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($etape['numero_etape'] . " - " . $etape['depart'] . " -> " . $etape['arrivee']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Afficher le classement</button>
            </form>

            <!-- Formulaire pour ajouter un membre -->
            <button id="add-member-btn">+ Ajouter un chrono</button>
            <form id="add-member-form" method="POST" style="display: none;">
                <label for="etape_id">Étape :</label>
                <select id="etape_id" name="etape_id" required>
                    <?php foreach ($etapes as $etape): ?>
                        <option value="<?php echo htmlspecialchars($etape['id']); ?>">
                            <?php echo htmlspecialchars($etape['numero_etape'] . " - " . $etape['depart'] . " -> " . $etape['arrivee']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="existing_member_id">Membre existant :</label>
                <select id="existing_member_id" name="existing_member_id">
                    <option value="">-- Sélectionnez un membre existant --</option>
                    <?php foreach ($members as $member): ?>
                        <option value="<?php echo htmlspecialchars($member['id']); ?>">
                            <?php echo htmlspecialchars($member['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="name">Nouveau membre :</label>
                <input type="text" id="name" name="name" placeholder="Nom du nouveau membre">

                <label for="date_naissance">Date de naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance">

                <label for="temps">Temps (HH:MM:SS) :</label>
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

    <script src="assets/js/tournoi.js"></script>
    <?php include 'assets/inc/footer.inc.php'; ?>
</body>
</html>
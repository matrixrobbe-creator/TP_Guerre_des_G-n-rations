<?php
/**
 * Script d'affichage de la liste complète des expressions
 * Développé par ROBBE Maxime BTS SIO SLAM 1
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Connexion à la base
require_once 'connexion.php';

try {
    // 2. Requête SQL avec JOINTURE pour avoir le nom de la catégorie
    $sql = "SELECT e.terme, e.contexte, e.exemple, c.nom AS thematique 
            FROM expressions e 
            JOIN categories c ON e.categorie_id = c.id 
            ORDER BY c.nom, e.terme";

    $requete = $pdo->query($sql);
    $toutes_les_expressions = $requete->fetchAll();

} catch (PDOException $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des expressions - BDD</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table { width: 90%; margin: 20px auto; border-collapse: collapse; font-family: sans-serif; }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        th { background-color: #4f46e5; color: white; }
        tr:nth-child(even) { background-color: #f8fafc; }
        .btn-retour { display: block; width: 200px; margin: 20px auto; text-align: center; padding: 10px; background: #1e293b; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

    <h1 style="text-align: center;">Toutes les expressions enregistrées</h1>

    <table>
        <thead>
            <tr>
                <th>Thématique</th>
                <th>Terme</th>
                <th>Contexte / Définition</th>
                <th>Exemple</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($toutes_les_expressions) > 0): ?>
                <?php foreach ($toutes_les_expressions as $exp): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($exp['thematique']); ?></strong></td>
                        <td><?php echo htmlspecialchars($exp['terme']); ?></td>
                        <td><?php echo htmlspecialchars($exp['contexte']); ?></td>
                        <td><em><?php echo htmlspecialchars($exp['exemple'] ?? 'Non renseigné'); ?></em></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Aucune expression trouvée dans la base.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="../../index.html" class="btn-retour">Retour au dictionnaire</a>

</body>
</html>
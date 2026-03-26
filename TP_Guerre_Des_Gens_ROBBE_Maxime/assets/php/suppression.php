<?php
/**
 * Script de gestion de suppression
 * Développé par ROBBE Maxime BTS SIO SLAM 1
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connexion.php';

try {
    // On vérifie si le formulaire de suppression a été soumis
    if (isset($_POST['bouton_suppression'])) {
        $idTheme = $_POST['id_thematique'];
        $suppressionExpression = $_POST['suppression_excuse']; 

        // Correction : DELETE FROM au lieu de DROP INTO
        $requeteSuppression = $pdo->prepare("DELETE FROM expressions WHERE categorie_id = ? AND terme = ?");
        $requeteSuppression->execute([$idTheme, $suppressionExpression]);

        if ($requeteSuppression->rowCount() > 0) {
            $titre_affichage = "C'est tout bon !";
            $expression_a_afficher = "L'expression a été supprimée avec succès de la base de données.";
        } else {
            $titre_affichage = "Oups !";
            $expression_a_afficher = "Aucune expression trouvée avec ce texte dans cette catégorie.";
        }
    } 
    else {
        $titre_affichage = "Oups !";
        $expression_a_afficher = "Aucune donnée n'a été reçue. Veuillez utiliser le formulaire.";
    }

} catch (PDOException $erreur) {
    die('Erreur technique (Base de données) : ' . $erreur->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dictionnaire d'expressions - Résultat</title>
</head>
<body>

    <div class="formulaire_style" style="text-align: center; max-width: 500px; margin: 50px auto; padding: 20px;">
        <h1><?php echo htmlspecialchars($titre_affichage); ?></h1>
        
        <p style="font-style: italic; font-size: 1.2rem; color: #1e293b; margin: 30px 0;">
            "<?php echo htmlspecialchars($expression_a_afficher); ?>"
        </p>
        
        <a href="../../index.html" style="text-decoration: none;">
            <button type="button" style="width: 100%; padding: 10px; cursor: pointer;">Retour à l'accueil</button>
        </a>
    </div>

</body>
</html>
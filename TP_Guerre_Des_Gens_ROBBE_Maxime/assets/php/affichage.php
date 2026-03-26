<?php
/**
 * Script de gestion des expressions pour les anciennes et nouvelles générations
 * Développé par ROBBE Maxime BTS SIO SLAM 1
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Paramètres de connexion
require_once 'connexion.php';

// Initialisation des variables pour éviter les erreurs d'affichage
$titre_affichage = "";
$expression_a_afficher = "";

// 2. Logique d'aiguillage

// CAS 1 : GÉNÉRER une expression (Bouton principal)
if (isset($_POST['bouton_generer'])) {
    // On récupère l'ID de la thématique choisi dans le <select>
    $idTheme = $_POST['id_thematique'];

    // Correction : Table 'expressions' et colonne 'categorie_id'
    $requeteLecture = $pdo->prepare("SELECT terme, contexte FROM expressions WHERE categorie_id = ? ORDER BY RAND() LIMIT 1");
    $requeteLecture->execute([$idTheme]);
    $resultat = $requeteLecture->fetch();

    $titre_affichage = "Ton expression :";
    
    if ($resultat) {
        // On combine le terme et son explication
        $expression_a_afficher = htmlspecialchars($resultat['terme']) . " (" . htmlspecialchars($resultat['contexte']) . ")";
    } else {
        $expression_a_afficher = "Navré, aucune expression n'est disponible pour ce thème.";
    }
}

// CAS 2 : RAJOUTER une expression
elseif (isset($_POST['bouton_ajouter'])) {
    $idTheme = $_POST['id_thematique'];
    $nouveauTerme = $_POST['contenu_excuse']; // On récupère le texte saisi

    // Correction : Insertion dans la table 'expressions'
    // Note : On laisse 'contexte' vide ou avec une valeur par défaut car ton formulaire ne semble pas le demander
    $requeteAjout = $pdo->prepare("INSERT INTO expressions (categorie_id, terme, contexte) VALUES (?, ?, 'Ajouté par l\'utilisateur')");
    $requeteAjout->execute([$idTheme, $nouveauTerme]);

    $titre_affichage = "Merci !";
    $expression_a_afficher = "L'expression a été ajoutée avec succès à notre collection.";
} 

// CAS PAR DÉFAUT : Si accès direct sans formulaire
else {
    $titre_affichage = "Oups !";
    $expression_a_afficher = "Veuillez d'abord sélectionner une thématique sur la page d'accueil.";
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

    <div class="formulaire_style" style="text-align: center; max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <h1><?php echo $titre_affichage; ?></h1>
        
        <p style="font-style: italic; font-size: 1.4rem; color: #4f46e5; margin: 30px 0;">
            "<?php echo $expression_a_afficher; ?>"
        </p>

        <a href="../../index.html" style="text-decoration: none;">
            <button type="button" style="width: 100%; padding: 10px; cursor: pointer;">Retour à l'accueil</button>
        </a>
    </div>

</body>
</html>
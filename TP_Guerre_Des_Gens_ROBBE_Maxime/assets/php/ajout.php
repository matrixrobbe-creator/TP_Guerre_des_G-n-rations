<?php
/**
 * Script d'ajout d'expressions
 * Développé par ROBBE Maxime BTS SIO SLAM 1
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Paramètres de connexion
require_once 'connexion.php';

// Initialisation des variables pour l'affichage
$titre_affichage = "";
$expression_a_afficher = "";

try {
    // On vérifie si le formulaire d'ajout a été soumis
    if (isset($_POST['bouton_ajouter'])) {
        $idTheme = $_POST['id_thematique'];
        $nouveauTerme = $_POST['contenu_expression']; 

        // Insertion dans la table 'expressions' (colonnes conformes à ta BDD)
        $requeteAjout = $pdo->prepare("INSERT INTO expressions (categorie_id, terme, contexte) VALUES (?, ?, 'Ajouté manuellement')");
        $requeteAjout->execute([$idTheme, $nouveauTerme]);

        $titre_affichage = "Merci !";
        $expression_a_afficher = "L'expression a été ajoutée avec succès à la collection.";
    } 
    
    // CAS PAR DÉFAUT : Si on arrive sur la page sans avoir cliqué sur le bouton
    else {
        $titre_affichage = "Oups !";
        $expression_a_afficher = "Aucune donnée n'a été reçue. Veuillez utiliser le formulaire d'ajout.";
    }

} catch (PDOException $erreur) {
    // En cas d'erreur SQL (ex: mauvaise IP de VM, table inexistante)
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
        <h1><?php echo $titre_affichage; ?></h1>
        
        <p style="font-style: italic; font-size: 1.2rem; color: #1e293b; margin: 30px 0;">
            "<?php echo $expression_a_afficher; ?>"
        </p>

        
           <a href="../../index.html" style="text-decoration: none;">
            <button type="button" style="width: 100%; padding: 10px; cursor: pointer;">Retour à l'accueil</button>
        </a>
        
    </div>

</body>
</html>
<?php
/**
 * Script de modification des expressions
 * Développé par ROBBE Maxime BTS SIO SLAM 1
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connexion.php';

$titre = "";
$message = "";

try {
    if (isset($_POST['bouton_modifier'])) {
        // On récupère le nom saisi et le nouveau contenu
        $nomCible = trim($_POST['nom_expression']); 
        $nouveauContenu = trim($_POST['nouveau_contenu']);

        // Requête UPDATE basée sur le nom
        // ATTENTION : vérifie si ta colonne s'appelle 'terme' ou 'nom' dans ta BDD
        $requete = $pdo->prepare("UPDATE expressions SET contexte = ? WHERE terme = ?");
        $requete->execute([$nouveauContenu, $nomCible]);

        if ($requete->rowCount() > 0) {
            $titre = "Succès !";
            $message = "L'expression '" . htmlspecialchars($nomCible) . "' a été mise à jour avec succès.";
        } else {
            $titre = "Info";
            $message = "Aucune modification effectuée. Vérifiez que le nom est exact ou que le contenu est différent.";
        }
    } else {
        header('Location: ../../index.html');
        exit;
    }
} catch (PDOException $e) {
    die("Erreur technique : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Résultat Modification</title>
</head>
<body>
    <div class="formulaire_style" style="text-align: center; margin: 50px auto;">
        <h1><?php echo $titre; ?></h1>
        <p style="margin: 20px 0;"><?php echo $message; ?></p>
        <a href="../../index.html"><button type="button">Retour</button></a>
    </div>
</body>
</html>
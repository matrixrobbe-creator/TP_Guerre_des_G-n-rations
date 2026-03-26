<?php
/**
 * Script de gestion des mots pour les anciennes génération et les nouvelles
 * Developpé par ROBBE Maxime BTS SIO SLAM 1
 */

// 1. Paramètres de connexion
$hote = 'localhost';
$nom_bdd = 'termes_jeunes_db'; 
$utilisateur = 'sio';
$mot_de_passe = 'azertysio';

$excuse_a_afficher = "";
$titre_affichage = "";

try {
    // 2. Connexion à la base de données
    $dsn = "mysql:host=$hote;dbname=$nom_bdd;charset=utf8mb4";
    $configuration = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $pdo = new PDO($dsn, $utilisateur, $mot_de_passe, $configuration);
} catch (PDOException $erreur) {
    die('Erreur technique (Moteur en panne) : ' . $erreur->getMessage());
}
?>
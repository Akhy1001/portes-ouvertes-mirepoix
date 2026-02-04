<?php
// Configuration de la base de données
// À MODIFIER AVEC VOS INFORMATIONS PHPMYADMIN
$host = 'localhost';
$dbname = 'portes_ouvertes';
$username = 'root'; // Par défaut sur WAMP/XAMPP
$password = '';     // Par défaut vide sur WAMP/XAMPP (sur MAMP, c'est souvent 'root')

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, on arrête tout et on affiche le message
    // En production, il vaut mieux cacher $e->getMessage() et afficher une erreur générique
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>

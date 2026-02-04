<?php
require_once 'config.php';

try {
    if ($pdo) {
        echo "<h1>✅ Connexion réussie à la base de données !</h1>";
        echo "<p>Votre site est bien connecté à la base <strong>$dbname</strong>.</p>";
    }
} catch (Exception $e) {
    echo "<h1>❌ Erreur de connexion</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>

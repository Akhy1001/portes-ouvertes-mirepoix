<?php
header('Content-Type: application/json');

// Inclure la configuration de la base de données
require_once 'config.php';

// Vérifier si la requête est bien POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupérer le type de formulaire
$formType = $_POST['form_type'] ?? '';

try {
    if ($formType === 'Collège') {
        // --- TRAITEMENT FORMULAIRE COLLÈGE ---
        $stmt = $pdo->prepare("INSERT INTO inscriptions_college (nom, prenom, email, etablissement_origine, classe_actuelle, options, commentaire, recontact) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Gestion des checkbox "options" (tableau vers chaîne séparée par virgules)
        $options = isset($_POST['options']) && is_array($_POST['options']) ? implode(', ', $_POST['options']) : '';

        $stmt->execute([
            $_POST['nom'] ?? '',
            $_POST['prenom'] ?? '',
            $_POST['email'] ?? '',
            $_POST['etablissement'] ?? '',
            $_POST['classe'] ?? '',
            $options,
            $_POST['commentaire'] ?? '',
            $_POST['recontact'] ?? 'non'
        ]);

    } elseif ($formType === 'Lycée') {
        // --- TRAITEMENT FORMULAIRE LYCÉE ---
        $stmt = $pdo->prepare("INSERT INTO inscriptions_lycee (nom, prenom, email, departement, etablissement_origine, classe_actuelle, visite_pour, options_seconde, recontact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Checkbox : Visite concerne
        // Note: Dans le HTML actuel, le name est 'options' pour collège mais n'est pas explicite pour lycée groupé.
        // On va devoir adapter le JS pour bien envoyer les groupes de checkbox.
        // Supposons que le JS envoie 'visite_pour' et 'options_seconde' sous forme de tableaux ou champs multiples.
        // Pour simplifier ici, on attendra que le Javascript formate les données correctement ou on récupère tout ce qui arrive.
        
        // On va récupérer POST direct, mais attention, les checkbox HTML avec même "name" s'écrasent si on n'utilise pas name="truc[]".
        // Le JS FormData enverra plusieurs fois la même clé. PHP gère ça si name finit par [].
        // Sinon le JS doit concaténer. On va adapter le JS pour tout gérer proprement.
        
        // Pour ce script, on attend des chaînes de caractères pré-concaténées par le JS ou gérées via form name="valeur[]"
        // L'approche la plus simple avec fetch + FormData est de laisser PHP gérer les tableaux si les names sont 'name[]'.
        // Ou alors on fait confiance au JS pour concaténer.
        
        // Ici, on va supposer que le name HTML sera adapté ou que le JS enverra des strings.
        // Faisons l'insertion basique :
        
        $visitePour = isset($_POST['visite_pour']) ? (is_array($_POST['visite_pour']) ? implode(', ', $_POST['visite_pour']) : $_POST['visite_pour']) : '';
        $optionsSeconde = isset($_POST['options_seconde']) ? (is_array($_POST['options_seconde']) ? implode(', ', $_POST['options_seconde']) : $_POST['options_seconde']) : '';

        $stmt->execute([
            $_POST['nom'] ?? '',
            $_POST['prenom'] ?? '',
            $_POST['email'] ?? '',
            $_POST['departement'] ?? '',
            $_POST['etablissement'] ?? '',
            $_POST['classe'] ?? '',
            $visitePour,
            $optionsSeconde,
            $_POST['recontact_lycee'] ?? 'non'
        ]);

    } elseif ($formType === 'Sortie') {
        // --- TRAITEMENT FORMULAIRE AVIS ---
        $stmt = $pdo->prepare("INSERT INTO avis_visiteurs (points_forts, points_faibles, commentaire) VALUES (?, ?, ?)");
        
        $stmt->execute([
            $_POST['points_forts'] ?? '',
            $_POST['points_faibles'] ?? '',
            $_POST['commentaire_sortie'] ?? ''
        ]);

    } else {
        throw new Exception("Type de formulaire inconnu.");
    }

    echo json_encode(['success' => true, 'message' => 'Données enregistrées avec succès !']);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur : ' . $e->getMessage()]);
}
?>

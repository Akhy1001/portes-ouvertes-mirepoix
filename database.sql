-- Création de la base de données (si elle n'existe pas)
CREATE DATABASE IF NOT EXISTS portes_ouvertes;
USE portes_ouvertes;

-- Table pour le formulaire Collège
CREATE TABLE IF NOT EXISTS inscriptions_college (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    etablissement_origine VARCHAR(150),
    classe_actuelle VARCHAR(50),
    options TEXT, -- Stockera les options choisies séparées par des virgules
    commentaire TEXT,
    recontact ENUM('oui', 'non'),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour le formulaire Lycée
CREATE TABLE IF NOT EXISTS inscriptions_lycee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    departement VARCHAR(50),
    etablissement_origine VARCHAR(150),
    visite_pour TEXT, -- Voies concernées (Générale, Techno, etc.)
    options_seconde TEXT,
    recontact ENUM('oui', 'non'),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour l'avis de fin de visite
CREATE TABLE IF NOT EXISTS avis_visiteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    points_forts TEXT,
    points_faibles TEXT,
    commentaire TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

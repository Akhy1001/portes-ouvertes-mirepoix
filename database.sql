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
    classe_actuelle VARCHAR(50),
    visite_pour TEXT, -- Contient : 2nd GT (CIT, Pas d'option, Foot, Equitation, Sport, Latin, Arts...), 1ère G (Maths, NSI, SVT...), 1ère T, Pro, BTS, Licence CAPPI
    options_seconde TEXT, -- (Obsolète dans la nouvelle version du formulaire, gardé pour compatibilité)
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

-- Mise à jour de la table pour éviter l'erreur sur "Autre" si le champ était trop court ou en ENUM
ALTER TABLE inscriptions_lycee MODIFY COLUMN departement VARCHAR(50);
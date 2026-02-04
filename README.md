# Portes Ouvertes - Cité Scolaire de Mirepoix

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![Status](https://img.shields.io/badge/status-live-green.svg)

Bienvenue sur le dépôt de l'application web dédiée à la **Journée Portes Ouvertes (JPO) 2026** de la Cité Scolaire de Mirepoix.

Ce projet remplace les formulaires papier par une interface web moderne, responsive et intuitive pour collecter les informations des visiteurs (Collège, Lycée) et leurs retours d'expérience.

##  Fonctionnalités

L'application est une "Single Page Application" (SPA) légère qui gère trois parcours distincts basés sur les documents officiels de l'établissement :

### 1. Parcours Collège
Destiné aux futurs élèves de 6ème à la 3ème.
* [cite_start]Collecte des coordonnées (Nom, Prénom, Email, Établissement d'origine)[cite: 7, 8, 9, 10].
* [cite_start]Sélection des options spécifiques : Section Foot, UNSS, ou sans option[cite: 17, 18, 19].
* [cite_start]Demande de recontact[cite: 25].

### 2. Parcours Lycée & Supérieur
Destiné aux élèves entrant en Seconde ou poursuivant en BTS/Licence.
* [cite_start]Identification du département d'origine (09, 11, 31, ou autre)[cite: 54, 55, 56].
* [cite_start]Choix de la voie : Générale, Technologique, Professionnelle, BTS, Licence[cite: 71, 72, 73, 74, 75].
* [cite_start]Sélection détaillée des options de seconde : Section Équitation, Sport, CIT, LV3/Latin, etc.[cite: 87, 88, 89, 90].

### 3. Parcours "Sortie" (Feedback)
Formulaire de satisfaction à remplir en fin de visite.
* [cite_start]Points forts et points faibles de l'organisation[cite: 113, 114].
* [cite_start]Commentaires libres pour l'amélioration future[cite: 115].

## Stack Technique

Ce projet est conçu pour être ultra-léger et ne nécessite aucun serveur complexe ni installation.

* **HTML5** : Structure sémantique.
* **CSS3** : Design responsive (Mobile First), variables CSS pour les couleurs institutionnelles, animations douces.
* **JavaScript (Vanilla)** : Gestion de l'affichage dynamique des sections (SPA) et traitement des formulaires.

## Installation et Utilisation

Aucune compilation (npm/yarn) n'est nécessaire.

1.  **Cloner le projet** :
    ```bash
    git clone [https://github.com/votre-nom/jpo-mirepoix-2026.git](https://github.com/votre-nom/jpo-mirepoix-2026.git)
    ```
2.  **Lancer** :
    Ouvrez simplement le fichier `index.html` dans n'importe quel navigateur web moderne (Chrome, Firefox, Safari, Edge).

## Configuration des Données

Actuellement, le script `script.js` simule l'envoi des données et les affiche dans la console du navigateur (`F12` > Console).

**Pour connecter un vrai stockage (Google Sheets / Email) :**
1.  Ouvrez `script.js`.
2.  Dans la fonction `handleForm`, remplacez le `console.log` par un appel `fetch()` vers votre API ou un service comme *Formspree* ou *Google Apps Script*.

## Aperçu de la structure

```text
/
├── index.html      # Structure principale et formulaires
├── style.css       # Mise en page, couleurs et design responsive
├── script.js       # Logique de navigation et gestion des données
└── README.md       # Documentation

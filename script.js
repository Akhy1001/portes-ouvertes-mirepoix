// Fonction pour naviguer entre les sections
function showSection(sectionId) {
    // Masquer toutes les sections principales
    const sections = document.querySelectorAll('main > section');
    sections.forEach(section => {
        section.classList.remove('active');
        section.classList.add('hidden');
    });

    // Afficher la section demandée
    const activeSection = document.getElementById(sectionId);
    if (activeSection) {
        activeSection.classList.remove('hidden');
        activeSection.classList.add('active');

        // Remonter en haut de page pour le confort mobile
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

// Gestion de la soumission des formulaires
function handleForm(event, formName) {
    event.preventDefault(); // Empêche le rechargement réel de la page

    // Ici, vous pourriez ajouter le code pour envoyer les données à un serveur ou Google Sheets
    // Pour l'instant, on simule une réussite

    console.log(`Formulaire ${formName} soumis.`);

    // Récupération des données (exemple)
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    console.log(data);

    // Afficher l'écran de confirmation
    showSection('confirmation');
}
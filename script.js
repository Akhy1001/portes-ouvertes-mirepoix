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
// Gestion de la soumission des formulaires
function handleForm(event, formName) {
    event.preventDefault(); // Empêche le rechargement réel de la page

    const formData = new FormData(event.target);
    formData.append('form_type', formName);

    fetch('submit_form.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(`Formulaire ${formName} soumis avec succès.`);
                showSection('confirmation');
            } else {
                alert('Erreur: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            alert("Une erreur s'est produite lors de l'envoi.");
        });
}
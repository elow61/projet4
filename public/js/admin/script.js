// Espace admin (BOUTON SUPPRIMER UN CHAPITRE)
function alertButton() {
    document.getElementById('link-delete').addEventListener('click', () => {
        if(confirm("Soutaitez-vous vraiment supprimer ce chapitre ?")) {
            alert("Chapitre supprimé !");
        };
    });
};

// BOUTON "MODIFIER"
// function uptadeButton() {
    
//     function vue() {
//         const section = document.getElementById('updating');

//         if (section.style.display = 'none') {
//             section.style.display = 'block';
//         } else {
//             section.style.display = 'none';
//         }
//     }

//     const buttonUpdate = document.getElementById('link-update');
//     const buttonDelete = document.getElementById('link-delete');

//     buttonUpdate.addEventListener('click', vue);
//     buttonDelete.addEventListener('click', vue);
// }
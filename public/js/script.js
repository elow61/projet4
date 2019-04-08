// Menu Hamburger
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('btn-nav').addEventListener('click', () => {
        const openClass = 'open';
        const openNav = document.getElementById('menu');

        if (openNav.classList.contains(openClass) === true) {
            openNav.classList.remove(openClass);
        } else {
            openNav.classList.add(openClass);
        }
    });
});

// Formulaire de signalement
document.getElementById('report-btn').addEventListener('click', () => {
    
    const classD = 'display';
    const form = document.getElementById('form-hidden');

    if (form.classList.contains(classD) === true) {
        form.classList.remove(classD);
    } else {
        form.classList.add(classD);
    }
});

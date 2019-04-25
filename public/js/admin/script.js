// Menu Hamburger 
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('hamburger').addEventListener('click', () => {
        const classActive = 'isActive';
        const menu = document.getElementById('header-mobile');

        if (menu.classList.contains(classActive) === true) {
            menu.classList.remove(classActive);
        } else {
            menu.classList.add(classActive);
        }
    });
});
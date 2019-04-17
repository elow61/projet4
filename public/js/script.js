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


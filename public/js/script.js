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
// const button = document.querySelectorAll('button.report-btn');

// for (let i = 0; i < button.length; i++) {
//     button[i].addEventListener('click', () => {
    
//         const classD = 'display';
//         const form = document.querySelector('div.form-hidden');
        
        
//         console.log(form);

//         for (let i = 0; i < form.length; i++) {
//             form[i].classList.toggle('display');
//         }
//         // if (form.classList.contains(classD) === true) {
//         //     form.classList.remove(classD);
//         // } else {
//         //     form.classList.add(classD);
//         // }
    
//         // document.getElementsByClassName('no-report').addEventListener('click', () => {
//         //     form.classList.remove(classD);
//         // })
//     });
// }


// Commentaire signalé
document.getElementById('yes-report').addEventListener('click', () => {
    const button = document.getElementById('yes-report');
    const mess = document.getElementById('mess-report');
    const classD = 'display';

    button.style.display = 'none';
    
    if (mess.classList.contains(classD) === false) {
        mess.classList.add(classD);
    } 

});

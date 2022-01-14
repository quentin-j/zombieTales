const headerMenu = {
    headerMenuElement: document.querySelector('.burgerMenu'),
    init: function() {
        console.log('menu init');
        const burgerButtonElement = document.querySelector('.buttonBurger');
        burgerButtonElement.addEventListener('click', headerMenu.handleClickButtonBurger);
        const closeButtonElement = document.querySelector('.closeButton');
        closeButtonElement.addEventListener('click', headerMenu.handleClickCloseButton);
    },
    handleClickButtonBurger: function() {
        headerMenu.headerMenuElement.classList.remove('burgerHidden');
    },
    handleClickCloseButton: function() {
        headerMenu.headerMenuElement.classList.add('burgerHidden')
    }
}

document.addEventListener('DOMContentLoaded', headerMenu.init);
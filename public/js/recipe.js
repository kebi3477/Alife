class View {
    constructor() {
        this.popup = document.querySelector('.popup');
        this.close();
    }
    show() {
        this.popup.style.display = 'flex';
    }
    close() {
        this.popup.style.display = 'none';
    }
}

const view = new View;
const recipeItems = document.querySelectorAll('.recipe__item');
const viewClose = document.querySelector('.view__close');

recipeItems.forEach(el => el.onclick = () => view.show());
viewClose.onclick = () => view.close();
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

fetch('controller/recipe/getRecipeByTop')
.then(recipes => recipes.json())
.then(recipes => {
    const rank = document.querySelector('.rank');
    const item = rank.querySelector('.recipe__item');
    recipes.forEach(recipe => {
        const dom = item.cloneNode(true);    
        dom.querySelector('.recipe__title').innerText = recipe.title;
        dom.querySelector('.recipe__content').innerText = recipe.intro;
        dom.querySelector('.recipe__img').style.backgroundImage = `url(/recipes/${recipe.id}/reg_img.jpg)`;
        dom.querySelector('.recipe__user-name').innerText = recipe.user;
        rank.append(dom);
    })
    item.remove();
})
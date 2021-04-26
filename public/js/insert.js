const ingredientAll = document.querySelector('.ingredient__all');
const insertButtonAppend = document.querySelector('.insert__button-append');

insertButtonAppend.onclick = () => appendIngredient();

function appendIngredient() {
    const dom = ingredientAll.cloneNode(true);
    dom.querySelector('.insert__label').innerText = '';
    ingredientAll.append(dom);
}
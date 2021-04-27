const ingredientAll = document.querySelector('.ingredient__all');
const ingredientEnd = document.querySelector('.ingredient__end');
const insertButtons = document.querySelectorAll('.insert__button-append');
const insertSeq = document.querySelector('.insert__button--big');
const seqDom = document.querySelectorAll('.insert__form').item(1);

insertButtons.forEach(el => {
    el.addEventListener('click', function() {
        appendIngredient(this);
    })
})

insertSeq.addEventListener('click', function() {
    appendIngredient2(this);
})

function appendIngredient(that) {
    const ingredient = that.parentElement.previousElementSibling;
    const dom = ingredient.cloneNode(true);
    dom.querySelector('.insert__label').innerText = '';
    ingredient.parentElement.insertBefore(dom, that.parentElement);
}

function appendIngredient2(that) {
    const dom = seqDom.cloneNode(true);
    document.querySelector('.insert').insertBefore(dom, that.parentElement.nextElementSibling);
    that.remove();
}
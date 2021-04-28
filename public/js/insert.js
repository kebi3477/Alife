"use strict";
const seqDom = document.querySelectorAll('.insert__form').item(1).cloneNode(true);

function appendIngredient(that) {
    const ingredient = that.parentElement.previousElementSibling;
    const dom = ingredient.cloneNode(true);
    dom.querySelector('.insert__label').innerText = '';
    ingredient.parentElement.insertBefore(dom, that.parentElement);
}

function appendSeq(that) {
    const dom = seqDom.cloneNode(true);
    document.querySelector('.insert').insertBefore(dom, that.parentElement.nextElementSibling);
    that.remove();
}
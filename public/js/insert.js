"use strict";
const insert = document.querySelector('.insert');
const seqDom = document.querySelectorAll('.insert__form').item(1).cloneNode(true);
const hashtagBox = document.querySelector('.hashtag__box');
const insertHashtag = document.querySelector('.insert__hashtag');
const insertSubmit = document.querySelector('.insert__submit');

insertHashtag.addEventListener('keyup', function(e) {
    this.value = this.value.replaceAll(" ", "");
    if(e.keyCode === 32 && this.value !== "") {
        const hastag = document.createElement('div');

        hastag.classList.add('hashtag');
        hastag.innerHTML = `${this.value}<div class="hashtag__close"><img src="public/images/icon/close_s.svg"></div>`;
        hastag.querySelector('.hashtag__close').onclick = () => hastag.remove();
        hashtagBox.append(hastag);
        this.value = "";
    }
})
insertSubmit.onclick = () => setRecipe();

function appendIngredient(that) {
    const ingredient = that.parentElement.previousElementSibling;
    const dom = ingredient.cloneNode(true);
    dom.querySelector('.insert__label').innerText = '';
    ingredient.parentElement.insertBefore(dom, that.parentElement);
}

function appendSeq(that) {
    const dom = seqDom.cloneNode(true);
    const step = dom.querySelector('.insert__step');
    const formCount = document.querySelectorAll('.insert__form').length;
    if(formCount === 21) {
        alert('20개까지만 만들 수 있습니다!');
    } else {
        step.innerText = `STEP ${formCount}`;
        document.querySelector('.insert').insertBefore(dom, that.parentElement.nextElementSibling);
        that.remove();
    }
}

function setRecipe() {
    const formData = new FormData(insert);
    const hashtags = document.querySelectorAll('.hashtag');
    const hashtag = [];

    hashtags.forEach(el => hashtag.push(el.textContent));
    formData.append("hashtags", hashtag)
    fetch('controller/fridge/setRecipe', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        console.log(msg);
    })
}
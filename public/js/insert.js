"use strict";
const insert = document.querySelector('.insert');
const seqDom = document.querySelector('.seq__dom').cloneNode(true);
const ingredientDom = document.querySelector('.ingredient__dom').cloneNode(true);
const files = document.querySelectorAll('input[type=file]');
const insertHashtag = document.querySelector('.insert__hashtag');
const insertSubmit = document.querySelector('.insert__submit');

files[0].addEventListener('change', function() {
    const insertImg = document.querySelector('.insert__img');
    if(this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            insertImg.innerText = "";
            insertImg.style.backgroundImage = `url("${e.target.result}")`;
        }
        reader.readAsDataURL(this.files[0]);
    }
})

insertHashtag.addEventListener('keyup', function(e) {
    const hashtagBox = document.querySelector('.hashtag__box');
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

function deleteIngredient(that) {
    that.parentElement.remove();
}

function appendIngredient(that) {
    const dom = ingredientDom.cloneNode(true);
    dom.querySelector('.insert__label').innerText = '';
    that.parentElement.parentElement.insertBefore(dom, that.parentElement);
}

function appendSeq(that) {
    const dom = seqDom.cloneNode(true);
    const step = dom.querySelector('.insert__step');
    const formCount = document.querySelectorAll('.insert__form').length;
    if(formCount === 21) {
        alert('20개까지만 만들 수 있습니다!');
    } else {
        step.innerText = `STEP ${formCount}`;
        insert.insertBefore(dom, that.parentElement.nextElementSibling);
        that.remove();
    }
}

function setRecipe() {
    const formData = new FormData(insert);
    const hashtag = insert.querySelectorAll('.hashtag');
    const insertForms = insert.querySelectorAll('.insert__form');
    const hashtags = [];
    const ingredients = [];
    const timers = [];
    
    insertForms.forEach((el, index) => {
        if(index) {
            const arr = [];
            const ingredientWrap = el.querySelectorAll(".ingredient__wrap");
            const timer = el.querySelectorAll('.timer input');
            const timeJson = {
                minute: timer[0].value,
                seconds: timer[1].value
            }
            ingredientWrap.forEach(wrap => {
                const ingredientInfo = wrap.querySelectorAll("input");
                const json = {
                    name: ingredientInfo[0].value,
                    amount: ingredientInfo[1].value
                }
                arr.push(json);
            })
            timers.push(timeJson);        
            ingredients.push(arr);
        }
    })
    hashtag.forEach(el => hashtags.push(el.textContent));
    formData.append("hashtags", hashtags);
    formData.append("ingredients", JSON.stringify(ingredients));
    formData.append("timers", JSON.stringify(timers));

    fetch('controller/fridge/setRecipe', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('등록 성공!');
            // location.href = "recipe";
        } else if(msg.status === 'A400') {
            alert('비어 있는 값이 있습니다!');
        } else if(msg.status === 'A500'){
            alert('서버 오류!');
        }
    })
}
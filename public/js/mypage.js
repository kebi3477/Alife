import loading from './loading.js';
import appendRecipeList from './view.js';
import appendMealkitItem from './mealkitModule.js';
import { getPoint } from './point.js';
const modify = document.querySelector('.modify');
const signout = document.querySelector('.signout');

modify.querySelector('.submit').addEventListener('click', function() {
    const formData = new FormData(modify);
    loading.start();
    fetch('controller/user/modify', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('변경 성공!');
            location.reload();
        } else if(msg.status === 'A400') {
            alert('값이 비어있습니다!');
        } else {    
            alert('에러!');
        }
        loading.end();
    })
})

modify.querySelector('.cancel').addEventListener('click', function() {
    history.back();
})

signout.addEventListener('click', function() {
    if(confirm('정말 삭제하시겠습니까?')) {
        const email = prompt('이메일을 입력해주세요.');
        fetch('controller/user/removeUser', {
            method: 'POST',
            body: email
        })
        .then(msg => msg.json())
        .then(msg => {
            if(msg.status === 'A200') {
                alert('회원탈퇴 완료!');
            } else {
                alert('에러!');
            }
            location.reload();
        })
    }
})

fetch('controller/recipe/getRecipeByWriter')
.then(recipes => recipes.json())
.then(recipes => {
    recipes && appendRecipeList(recipes, 'write__recipe-list');
})

fetch('controller/recipe/getRecipeByThumbsup')
.then(recipes => recipes.json())
.then(recipes => {
    recipes && appendRecipeList(recipes, 'thumbs__recipe-list');
})

fetch('controller/mealkit/getMealkitByWriter')
.then(mealkits => mealkits.json())
.then(mealkits => {
    if(mealkits.length)
        appendMealkitItem(mealkits, 'write__mealkit-list');
})

fetch('controller/mealkit/getMealkitByThumbsup')
.then(mealkits => mealkits.json())
.then(mealkits => {
    mealkits && appendMealkitItem(mealkits, 'thumbs__mealkit-list');
})

getPoint()
.then(json => {
    const inner = document.querySelector('.rank__bar-inner');
    const name = document.querySelector('.rank__name');
    const image = document.querySelector('.profile__img > img');

    inner.style.width = json.width;
    inner.style.backgroundColor = json.color;
    name.innerText = json.name;
    image.src = `public/images/icon/${json.image}`;
})  

fetch('controller/mealkit/getPayment')
.then(payments => payments.json())
.then(payments => {
    payments.forEach(data => {
        const historyItem = document.createElement('div');
        const date = data.payment_date.split(' ')[0];

        historyItem.classList.add('history__item');
        historyItem.innerHTML = `
            <div>${data.payment_uid}<br>${date}</div>
            <div class="history__info">
                <div class="history__img"><img src="mealkits/${data.mealkit_id}/title_img.jpg"></div>
                <div class="history__label--left">
                    <div class="history__label--small">${data.mealkit_cname}</div>
                    <div class="history__label--middle">${data.mealkit_name}</div>
                </div>
            </div>
            <div>${data.payment_amount} 개</div>
            <div class="history__label--right">${parseInt(data.payment_price).toLocaleString()}원</div>
            <div class="history__label--green">결제완료</div>
        `;
        historyItem.querySelector('.history__info').onclick = () => location.href = `mealkitDetail/${data.mealkit_id}`;
        document.querySelector('.history__list').append(historyItem);
    })
})
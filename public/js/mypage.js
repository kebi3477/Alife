import loading from './loading.js';
import appendRecipeList from './view.js';
import appendMealkitItem from './mealkitModule.js';
const modify = document.querySelector('.modify');

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

fetch('controller/recipe/getRecipeByWriter')
.then(recipes => recipes.json())
.then(recipes => {
    appendRecipeList(recipes, 'write__recipe-list');
})

fetch('controller/recipe/getRecipeByThumbsup')
.then(recipes => recipes.json())
.then(recipes => {
    appendRecipeList(recipes, 'thumbs__recipe-list');
})

fetch('controller/mealkit/getMealkitByWriter')
.then(mealkits => mealkits.json())
.then(mealkits => {
    appendMealkitItem(mealkits, 'write__mealkit-list');
})

fetch('controller/mealkit/getMealkitByThumbsup')
.then(mealkits => mealkits.json())
.then(mealkits => {
    mealkits && appendMealkitItem(mealkits, 'thumbs__mealkit-list');
})
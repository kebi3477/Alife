import appendRecipeList from './view.js';
import appendMealkitItem from './mealkitModule.js';
const url = new URL(window.location);
const urls = url.pathname.split('/');
if(urls[2]) {
    let cnt = 0;
    const title = document.querySelector('.title__text--small');
    fetch('/controller/recipe/getRecipeBySearch', {
        method: 'POST',
        body: urls[2]
    })
    .then(recipes => recipes.json())
    .then(recipes => {
        cnt += recipes.length;
        title.innerText = `총 ${cnt}건이 검색되었습니다.`;
        appendRecipeList(recipes, 'recipe__list');
    })

    fetch('/controller/mealkit/getMealkitBySearch', {
        method: 'POST',
        body: urls[2]
    })
    .then(mealkits => mealkits.json())
    .then(mealkits => {
        cnt += mealkits.length;
        title.innerText = `총 ${cnt}건이 검색되었습니다.`;
        appendMealkitItem(mealkits, 'mealkit__items');
    })
    
} else {
    const searchInput = document.querySelector('.search__input');
    const searchButton = document.querySelector('.search__button');
    
    searchInput && searchInput.addEventListener('keypress', function(e) {
        if(e.key === 'Enter') {
            location.href=`/search/${searchInput.value}`;
        }
    })
    searchButton && searchButton.addEventListener('click', function() {
        location.href=`/search/${searchInput.value}`;
    })
}
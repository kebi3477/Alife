import appendRecipeList from './view.js';

fetch('controller/recipe/getRecipeByTop')
.then(recipes => recipes.json())
.then(recipes => {
    appendRecipeList(recipes, 'rank');
})

fetch('controller/recipe/getRecipeByFridge')
.then(json => json.json()) 
.then(json => {
    if(json.status !== 'A400') {
        document.querySelector('.fridge__title').innerHTML = `${json.ingredient.name}<object data="public/images/ingredient/${json.ingredient.image}" type="image/svg+xml"></object> 냉장고에 남아 있다면?`;
        appendRecipeList(json.recipes, 'fridge');
    } else {    
        document.querySelector('.ingredient').remove();
    }
})
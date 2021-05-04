class View {
    constructor() {
        this.popup = document.querySelector('.popup');
        this.close();
    }
    show(recipe=null) {
        const formData = new FormData();

        formData.append("id", recipe.id)
        fetch('controller/recipe/getRecipeById', {
            method: 'POST',
            body: formData
        })
        .then(data => data.json())
        .then(data => {
            const collection = data.collection;
            const recipes = data.recipes;
            const rin = data.ringredients;
            const hashtagDom = this.popup.querySelector('.view__hashtag');
            const hashtags = collection.collection_hastag.split(",");
            // Collection 변경
            this.popup.querySelector('.info').innerHTML = `${collection.user_name}<br>${collection.collection_date}`;
            this.popup.querySelector('.title').innerText = collection.collection_title;
            // 해시태그 올리기
            this.popup.querySelectorAll('.hashtag').forEach(el => el.remove());
            hashtags.forEach(hashtag => {
                const dom = document.createElement('div');
                dom.classList.add('hashtag');
                dom.innerText = hashtag;
                hashtagDom.append(dom);
            })
            // 재료 넣기
            this.popup.querySelectorAll('.view__row').forEach((el, index) => index ? el.remove() : "");
            rin.forEach(ingred => {
                const dom = this.popup.querySelector('.view__row').cloneNode(true);
                dom.children[0].innerText = ingred.ringredient_name;
                dom.children[1].innerText = ingred.ringredient_amount;
                this.popup.querySelector('.view__grid').append(dom);
            })
            //레시피 변경
            this.popup.querySelector('.view__text').innerText = recipes[0].recipe_content;
            this.popup.querySelector('.view__slide-now').style.backgroundImage = `url('recipes/${collection.collection_id}/seq_img_1.jpg')`;
        })
        .then(() => {
            this.popup.style.display = 'flex';
        })
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
        dom.onclick = () => view.show(recipe);
        rank.append(dom);
    })
    item.remove();
})
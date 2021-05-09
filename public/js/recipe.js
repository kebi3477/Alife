class View {
    constructor() {
        this.popup = document.querySelector('.popup');
        this.now = 0;
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
            this.col = data.collection;
            const collection = data.collection;
            const recipes = data.recipes;
            const rin = data.ringredients;
            const hashtagDom = this.popup.querySelector('.view__hashtag');
            const hashtags = collection.collection_hastag.split(",");
            // Collection 변경
            this.popup.querySelector('.info').innerHTML = `${collection.user_name}<br>${collection.collection_date}`;
            this.popup.querySelector('.title').innerText = collection.collection_title;
            this.popup.querySelector('.time').innerText = `${collection.collection_time} 분 이내`;
            this.popup.querySelector('.serving').innerText = `${collection.collection_serving} 인분`;
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
            //레시피 등록
            this.appendRecipes(recipes);
        })
        .then(() => {
            this.popup.style.display = 'flex';
        })
    }
    close() {
        this.popup.style.display = 'none';
    }
    appendRecipes(recipes) {
        this.viewRecipes = this.popup.querySelector('.view__recipes');
        const viewRecipe = this.popup.querySelector('.view__recipe');
        recipes.forEach((recipe, index) => {
            const dom = viewRecipe.cloneNode(true);
            dom.querySelector('.view__text').innerText = recipe.recipe_content;
            dom.querySelector('.view__image').style.backgroundImage = `url('recipes/${this.col.collection_id}/seq_img_${index+1}.jpg')`;
            this.viewRecipes.append(dom);
        })
        this.viewRecipes.style.width = `${recipes.length}00%`;
        viewRecipe.remove();
        this.nextPage();
    }
    nextPage() {
        this.now++;
        this.viewRecipes.style.left = `-${this.now}00%`;
    }
    timer(time) {
        const duration = time*60000;
        this.popup.querySelector('.view__timebar').animate([
            { width: '0%' }, { width: '100%' }
        ], {
            duration: duration
        });
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
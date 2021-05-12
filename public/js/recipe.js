class View {
    constructor() {
        this.popup = document.querySelector('.popup');
        this.close();
    }
    init() {
        this.viewRecipes = this.popup.querySelector('.view__recipes');
        this.now = 0;
        this.slide();
    }
    show(id=null) {
        const formData = new FormData();
        
        this.init();
        formData.append("id", id);
        fetch('controller/recipe/getRecipeById', {
            method: 'POST',
            body: formData
        })
        .then(data => data.json())
        .then(data => {
            this.col = data.collection;
            this.recipes = data.recipes;
            this.rin = data.ringredients;
            const hashtagDom = this.popup.querySelector('.view__hashtag');
            const hashtags = this.col.collection_hastag.split(",");
            // Collection 변경
            this.popup.querySelector('.info').innerHTML = `${this.col.user_name}<br>${this.col.collection_date}`;
            this.popup.querySelector('.title').innerText = this.col.collection_title;
            this.popup.querySelector('.time').innerText = `${this.col.collection_time} 분 이내`;
            this.popup.querySelector('.serving').innerText = `${this.col.collection_serving} 인분`;
            // 해시태그 올리기
            this.popup.querySelectorAll('.hashtag').forEach(el => el.remove());
            hashtags.forEach(hashtag => {
                const dom = document.createElement('div');
                dom.classList.add('hashtag');
                dom.innerText = hashtag;
                hashtagDom.append(dom);
            })
            // 재료 넣기
            this.changeIngredients();
            //레시피 등록
            this.appendRecipes();
            this.timer(this.recipes[this.now].recipe_time);
        })
        .then(() => {
            this.popup.style.display = 'flex';
        })
    }
    changeIngredients(step=0) {
        let filtering;
        filtering = this.rin.filter(data => parseInt(data.recipe_seq) === step);
        // if(step) filtering = this.rin.filter(data => parseInt(data.recipe_seq) === step);
        // else filtering = this.rin;
        this.popup.querySelectorAll('.view__row').forEach((el, index) => index ? el.remove() : "");
        filtering.forEach(ingred => {
            const dom = this.popup.querySelector('.view__row').cloneNode(true);
            dom.children[0].innerText = ingred.ringredient_name;
            dom.children[1].innerText = ingred.ringredient_amount;
            this.popup.querySelector('.view__grid').append(dom);
        })
    }
    appendRecipes() {
        const viewRecipe = this.popup.querySelector('.view__recipe');
        this.popup.querySelectorAll('.view__recipe').forEach(el => el.remove());
        this.recipes.forEach((recipe, index) => {
            const dom = viewRecipe.cloneNode(true);
            dom.querySelector('.view__text').innerText = recipe.recipe_content;
            dom.querySelector('.view__image').style.backgroundImage = `url('recipes/${this.col.collection_id}/seq_img_${index+1}.jpg')`;
            this.viewRecipes.append(dom);
        })
        this.viewRecipes.style.width = `${this.recipes.length}00%`;
    }
    slide() {
        this.viewRecipes.style.left = `-${this.now}00%`;
    }
    nextPage() {
        this.now++;
        this.slide();
        this.timer(this.recipes[this.now].recipe_time);
        this.changeIngredients(this.now);
    }
    prevPage() {
        this.now--;
        this.slide();
        this.timer(this.recipes[this.now].recipe_time);
        this.changeIngredients(this.now);
    }
    timer(time) {
        const duration = time*60000;
        this.timeset = time*60-1;
        this.popup.querySelector('.view__timebar').animate([
            { width: '0%' }, { width: '100%' }
        ], {
            duration: duration
        });
        setTimeout(() => {
            this.nextPage();
        }, duration);
        this.interval = setInterval(() => {
            const min = Math.floor(this.timeset/60);
            const sec = this.timeset%60;
            this.timeset--;
            if(this.timeset === 0) clearInterval(this.interval);
            
            this.popup.querySelector('.view__watch').innerText = `${min}분 : ${sec}초`;
        }, 1000);
    }
    close() {
        clearInterval(this.interval);
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
        dom.onclick = () => view.show(recipe.id);
        rank.append(dom);
    })
    item.remove();
})
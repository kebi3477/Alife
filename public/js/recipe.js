class View {
    constructor() {
        this.popup = document.querySelector('.popup');
        this.close();
    }
    init() {
        this.viewRecipes = this.popup.querySelector('.view__recipes');
        this.viewStart = this.popup.querySelector('.view__start');
        this.viewWatch = this.popup.querySelector('.view__watch');
        this.viewStart.onclick = () => this.start();
        this.viewStart.innerText = '만들기 시작';
        this.viewStart.style.backgroundColor = 'var(--green-middle)';
        this.viewWatch.innerText = '';
        this.now = 0;
        this.cooking = false;
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
            // Collection 변경
            this.popup.querySelector('.title').innerText = this.col.collection_title;
            this.popup.querySelector('.time').innerText = `${this.col.collection_time} 분 이내`;
            this.popup.querySelector('.serving').innerText = `${this.col.collection_serving} 인분`;
            this.popup.querySelector('.name').innerText = this.col.user_name;
            this.popup.querySelector('.date').innerText = this.col.collection_date.split(" ")[0].replaceAll("-", ". ");
            // 해시태그 올리기
            this.appendHashtags();
            // 재료 넣기
            this.appendIngredients();
            //레시피 등록
            this.appendRecipes();
            this.slide();
        })
        .then(() => {
            this.popup.querySelector('.left').onclick = () => this.prevPage();
            this.popup.querySelector('.right').onclick = () => this.nextPage();
            this.popup.style.display = 'flex';
        })
    }
    close() {
        this.clearTimer();
        this.popup.style.display = 'none';
    }
    appendHashtags() {
        const hashtags = this.col.collection_hastag.split(",");
        const hashtagDom = this.popup.querySelector('.view__hashtag');
        this.popup.querySelectorAll('.hashtag').forEach(el => el.remove());
        hashtags.forEach(hashtag => {
            const dom = document.createElement('div');
            dom.classList.add('hashtag');
            dom.innerText = hashtag;
            hashtagDom.append(dom);
        })
    }
    appendIngredients(step=0) {
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
        if(this.cooking) this.timer(this.recipes[this.now].recipe_time);
        this.appendIngredients(this.now);
    }
    nextPage() {
        this.now < this.recipes.length-1 ? this.now++ : "";
        this.slide();
    }
    prevPage() {
        this.now > 0 ? this.now-- : "";
        this.slide();
    }
    clearTimer() {
        this.timeout && clearTimeout(this.timeout);
        this.interval && clearInterval(this.interval);
        this.barAnimate && this.barAnimate.finish();
    }
    timer(time) {
        const duration = time*60000;

        this.clearTimer();
        this.timeset = time*60-1;
        this.barAnimate = this.popup.querySelector('.view__timebar').animate([
            { width: '0%' }, { width: '100%' }
        ], {
            duration: duration
        });

        this.timeout = setTimeout(() => {
            this.nextPage();
        }, duration);

        this.viewWatch.innerText = `${Math.floor(this.timeset/60)+1}분 : 00초`;
        this.interval = setInterval(() => {
            const min = Math.floor(this.timeset/60);
            const sec = this.timeset%60;
            this.timeset--;            
            this.viewWatch.innerText = `${min}분 : ${sec}초`;
        }, 1000);
    }
    start() {
        if(confirm('요리를 시작하시겠습니까?')) {
            this.viewStart.onclick = () => this.end();
            this.viewStart.innerText = '만들기 종료';
            this.viewStart.style.backgroundColor = '#b90606';
            this.now = 0;
            this.cooking = true;
            this.slide();
        }
    }
    end() {
        if(confirm('요리를 종료하시겠습니까?')) {
            this.viewStart.onclick = () => this.start();
            this.viewStart.innerText = '만들기 시작';
            this.viewStart.style.backgroundColor = 'var(--green-middle)';
            this.clearTimer();
            this.cooking = false;
            this.slide();
        }
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
    appendRecipeList(recipes, 'rank');
})

fetch('controller/recipe/getRecipeByFridge')
.then(json => json.json()) 
.then(json => {
    document.querySelector('.fridge__title').innerHTML = `${json.ingredient.name}<object data="public/images/ingredient/${json.ingredient.image}" type="image/svg+xml"></object>가 냉장고에 남아 있다면?`;
    appendRecipeList(json.recipes, 'fridge');
})

function appendRecipeList(recipes, listName) {
    const rank = document.querySelector(`.${listName}`);
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
}
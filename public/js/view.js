import { changePoint } from './point.js';

class View {
    constructor() {
        this.popup = document.querySelector('.popup');
        this.viewRemocon = this.popup.querySelector('.view__remocon');
        this.viewRecipes = this.popup.querySelector('.view__recipes');
        this.viewTime = this.popup.querySelector('.view__time');
        this.popup.querySelector('.view').ondblclick = () => this.thumbsup();
        this.close();
    }
    init() {
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
        fetch('/controller/recipe/getRecipeById', {
            method: 'POST',
            body: formData
        })
        .then(data => data.json())
        .then(data => {
            this.col = data.collection;
            this.recipes = data.recipes;
            this.rin = data.ringredients;
            this.collectionId = this.col.collection_id;
            // Collection 변경
            const heart = this.popup.querySelector('.heart');
            const img = changePoint(this.col.user_point).image;
            const circles = this.popup.querySelector('.view__circles');
            const menu = this.popup.querySelector('.view__menus');
            this.popup.querySelector('.title').innerText = this.col.collection_title;
            this.popup.querySelector('.time').innerText = `${this.col.collection_time} 분 이내`;
            this.popup.querySelector('.serving').innerText = `${this.col.collection_serving} 인분`;
            this.popup.querySelector('.img').src = `/public/images/icon/${img}`;
            this.popup.querySelector('.name').innerText = this.col.user_name;
            this.popup.querySelector('.date').innerText = this.col.collection_date.split(" ")[0].replaceAll("-", ". ");
            this.popup.querySelector('.like').innerHTML = data.count;
            heart.style.fill = parseInt(data.thumbsup) === 1 ? 'var(--green-middle)' : "#fff";
            circles.onclick = () => menu.className.includes('menu__active') ? menu.classList.remove('menu__active') : menu.classList.add('menu__active');
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
        if(this.popup.querySelector('.view__ingredients')) {
            this.popup.querySelector('.view__ingredients').remove();
            this.popup.querySelector('.view__button').remove();
            this.popup.querySelector('.view__wrap').append(this.viewRemocon, this.viewRecipes, this.viewTime);
        }
        this.popup.querySelector('iframe') && this.popup.querySelector('iframe').remove();
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
        this.popup.querySelectorAll('.view__row').forEach((el, index) => index ? el.remove() : "");
        if(!this.now) {
            filtering = this.rin;            
        } else {
            filtering = this.rin.filter(data => parseInt(data.recipe_seq) === step);
        }
        filtering.forEach(ingred => {
            const dom = this.popup.querySelector('.view__row').cloneNode(true);
            dom.children[0].innerText = ingred.ringredient_name;
            dom.children[1].innerText = ingred.ringredient_amount;
            ingred.ringredient_name !== '없음' ? this.popup.querySelector('.view__grid').append(dom) : "";
        })
    }
    appendRecipes() {
        const viewRecipe = this.popup.querySelector('.view__recipe');
        const appendRecipe = (recipe, index) => {
            const dom = viewRecipe.cloneNode(true);
            const embedUrl = this.col.collection_video.split('watch?v=')[1];            
            this.viewRecipes.append(dom);
            if(!index) {
                dom.querySelector('.view__text').innerText = this.col.collection_intro;
                if(this.col.collection_video) {
                    dom.querySelector('.view__image').innerHTML = `
                        <iframe id="player" type="text/html" width="584" height="389"
                            src="https://www.youtube.com/embed/${embedUrl}" frameborder="0"></iframe>
                    `;
                } else {
                    dom.querySelector('.view__image').style.backgroundImage = `url('/recipes/${this.col.collection_id}/reg_img.jpg')`;
                }
                dom.querySelector('.view__title').innerText = '요리 소개';
            } else {
                dom.querySelector('.view__text').innerText = recipe.recipe_content;
                dom.querySelector('.view__image').style.backgroundImage = `url('/recipes/${this.col.collection_id}/seq_img_${index}.jpg')`;
            }
        }
    
        this.popup.querySelectorAll('.view__recipe').forEach(el => el.remove());
        appendRecipe("", 0);
        this.recipes.forEach((recipe, index) => {
            appendRecipe(recipe, index+1)
        });
        this.viewRecipes.style.width = `${this.recipes.length+1}00%`;
    }
    slide() {
        this.viewRecipes.style.left = `-${this.now}00%`;
        if(this.cooking) this.timer(this.recipes[this.now].recipe_time);
        this.appendIngredients(this.now);
    }
    nextPage() {
        if(this.now < this.recipes.length) {
            this.now++
        } else if(this.cooking) {
            this.end();
        }
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
            if(confirm('재료를 삭제하시겠습니까?')) {
                this.showDeleteIngredient();
            }
        }
    }
    showDeleteIngredient() {
        this.popup.querySelector('.view__recipes').remove();
        this.popup.querySelector('.view__remocon').remove();
        this.popup.querySelector('.view__time').remove();
        fetch('/controller/fridge/getMyFridge')
        .then(fridge => fridge.json())
        .then(fridge => {
            const viewTitle = document.createElement('div');
            const viewIngredients = document.createElement('form');
            const viewButton = document.createElement('div');
            viewTitle.classList.add('view__title', 'view__fixed');
            viewTitle.innerText = `음식을 다 만들었나요? 전부 사용한 재료를 선택해주세요.`;
            viewIngredients.classList.add('view__ingredients');
            fridge.forEach(json => {
                const viewIngredient = document.createElement('div');
                viewIngredient.classList.add('view__ingredient');
                viewIngredient.innerHTML = `
                    <div class="view__checkbox"><input type="checkbox" value=${json.fridge_id} name='fridge_id[]'></div>
                    <div class="view__img--ingredient"><img src="/public/images/ingredient/${json.ingredient_image}"></div>
                    <div>${json.ingredient_name}</div>
                `;
                viewIngredients.append(viewIngredient);
            })
            viewButton.classList.add('view__button');
            viewButton.innerText = '재료삭제';
            viewButton.onclick = () => this.deleteIngredient();
            this.popup.querySelector('.view__wrap').append(viewTitle);
            this.popup.querySelector('.view__wrap').append(viewIngredients);
            this.popup.querySelector('.view__wrap').append(viewButton);
        })
    }
    deleteIngredient() {
        const formData = new FormData(this.popup.querySelector('.view__ingredients'));
        
        fetch('/controller/fridge/deleteFridge', {
            method: 'POST',
            body: formData
        })
        .then(msg => msg.json())
        .then(msg => {
            if(msg.status === 'A200') {
                alert('성공적으로 제거했습니다!');
                this.close();
            } else if(msg.status === 'A400') {
                alert('1개 이상 선택해주세요!');
            } else {
                alert('에러!');
            }
        })
    }
    thumbsup(collectionId=null) {
        const formData = new FormData();
        
        collectionId = collectionId ? collectionId : this.collectionId;
        formData.append('collection_id', collectionId);
        fetch('/controller/recipe/setThumbsup', {
            method: 'POST',
            body: formData
        })
        .then(msg => msg.json())
        .then(msg => {
            const like = this.popup.querySelector('.like');
            const parents = document.querySelectorAll(`input[name=recipeId_${collectionId}]`);
            parents.forEach(parentDom => {
                const parent = parentDom.parentElement;
                const count = parent.querySelector('.recipe__count')
                
                if(msg.status === 'A200') {
                    this.popup.querySelector('.heart').style.fill = 'var(--green-middle)';
                    parent.querySelector('.heart--green').style.fill = 'var(--green-middle)';
                    parent.querySelector('.heart--white').style.fill = '#fff';
                    like.innerText = parseInt(like.textContent)+1;
                    count.innerText = parseInt(count.textContent)+1;
                } else if(msg.status === 'A401') {
                    this.popup.querySelector('.heart').style.fill = '#fff';
                    parent.querySelector('.heart--green').style.fill = 'transparent';
                    parent.querySelector('.heart--white').style.fill = 'transparent';
                    like.innerText = parseInt(like.textContent)-1;
                    count.innerText = parseInt(count.textContent)-1;
                } else if(msg.status === 'A400') {
                    alert('로그인을 해주세요!');
                    location.href = "login";
                } else {
                    alert('에러!');
                }
            })
        })
    }
}

const view = new View;
const recipeItems = document.querySelectorAll('.recipe__item');
const viewClose = document.querySelector('.view__close');

recipeItems.forEach(el => el.onclick = () => view.show());
viewClose.onclick = () => view.close();

function appendRecipeList(recipes, listName) {
    const rank = document.querySelector(`.${listName}`);
    recipes.forEach(recipe => {
        const dom = document.createElement('div');
        const image = changePoint(recipe.point).image;
        dom.classList.add('recipe__item');
        dom.innerHTML = `
            <input type='hidden' name='recipeId_${recipe.id}'>
            <div class="recipe__img"></div>
            <div class="recipe__title">${recipe.title}</div>
            <div class="recipe__content">${recipe.intro}</div>
            <div class="recipe--bottom">
                <div class="recipe__cover">
                    <div class="recipe__user-img"></div>
                    <div class="recipe__user-name">${recipe.user}</div>
                </div>
                <div class="recipe__cover">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 10.12 8.133">
                        <path class='heart--green' d="M40.45,36.559a2.023,2.023,0,0,0-1.857-1.894,1.8,1.8,0,0,0-2.108,1.205,1.8,1.8,0,0,0-2.108-1.205,2.023,2.023,0,0,0-1.857,1.894s-.534,2.195,3.919,5.27l.046.032.05-.035C40.983,38.752,40.45,36.559,40.45,36.559Z" transform="translate(-32.051 -33)"/>
                    </svg>              
                    <div class="recipe__user-name recipe__count">${recipe.count}</div>
                </div>
            </div>
            <div class="recipe__thumbs">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 13.547 12.403">
                    <path class='heart--white' d="M45.154,37.689A3.22,3.22,0,0,0,42.2,34.673c-2.823-.274-3.355,1.919-3.355,1.919s-.531-2.193-3.355-1.919a3.22,3.22,0,0,0-2.956,3.015s-.85,3.493,6.238,8.387l.073.052.08-.056C46,41.18,45.154,37.689,45.154,37.689Z" transform="translate(-32.07 -34.229)"/> 
                </svg>
            </div>
        `;
        dom.querySelector('.recipe__img').style.backgroundImage = `url(/recipes/${recipe.id}/reg_img.jpg)`;
        dom.querySelector('.recipe__user-img').style.backgroundImage = `url(/public/images/icon/${image})`;
        dom.querySelector('.recipe__thumbs').onclick = e => {
            e.stopPropagation()
            view.thumbsup(recipe.id);
        }
        dom.onclick = () => view.show(recipe.id);
        if(recipe.thumbsup_id) {
            dom.querySelector('.heart--green').style.fill = 'var(--green-middle)';
            dom.querySelector('.heart--white').style.fill = '#fff';
        } else {
            dom.querySelector('.heart--green').style.fill = 'transparent';
            dom.querySelector('.heart--white').style.fill = 'transparent';
        }
        rank.append(dom);
    })
}

export default appendRecipeList;
const ingreds = document.querySelector('.ingreds');
const categorys = document.querySelectorAll('.category');
const messageList = document.querySelector('.message__list');
const fridge = document.querySelector('.fridge');
const buttonSave = document.querySelector('.button__save');
const buttonReset = document.querySelector('.button__reset');
let myFridge = [];

class Ingred {
    constructor(el) {
        this.ingred = el;
        this.ingred.ondragstart = e => this.dragStart(e);
        this.name = el.querySelector('.ingred__name').textContent;
        this.emptyCanvas = document.createElement('canvas');
    }
    dragStart(e) {
        this.ingred.ondrag = e => this.drag(e);
        this.ingred.ondragend = e => this.dragEnd(e);
        this.ingred.classList.add('moving');
        this.ingred.ondrag(e);
        e.dataTransfer.setDragImage(this.emptyCanvas, 0, 0);
    }
    drag(e) {
        this.x = e.clientX;
        this.y = e.clientY;
    
        if(this.x !== 0 && this.y !== 0) {
            this.ingred.style.left = `${this.x-35}px`;
            this.ingred.style.top = `${this.y-35}px`;
        }
    }
    dragEnd(e) {
        const filtering = myFridge.filter(data => data.ingredient_id !== this.data.ingredient_id)
        myFridge = filtering;
        this.data.fridge_x = this.ingred.offsetLeft;
        this.data.fridge_y = this.ingred.offsetTop-16;
        if(e.clientX > fridge.offsetLeft 
        && e.clientX < fridge.offsetLeft + fridge.offsetWidth
        && e.clientY > fridge.offsetTop
        && e.clientY < fridge.offsetTop + fridge.offsetHeight) {
            myFridge.includes(this.data) ? "" : myFridge.push(this.data);
        } else {
            this.ingred.classList.remove('moving');
        }
        updateMessage();
    }
}

categorys.forEach(category => {
    category.onclick = e => changeCategory(e);
})
buttonSave.onclick = () => saveFridge();
buttonReset.onclick = () => resetFridge();
document.querySelector('.category').click();

function getIngredients(type='') { //식재료 가져오기
    const formData = new FormData();
    type = type === '전체' ? '' : type;
    formData.append('type', type);
    
    fetch('controller/fridge/getIngredients', {
        method: 'POST',
        body: formData
    })
    .then(data => data.json())
    .then(ingredients => {
        appendIngredients(ingredients);
        getMyFridge();
    })
}

function appendIngredients(ingredients) { //식재료 올리기
    ingreds.querySelectorAll('.ingred').forEach(el => el.remove())
    ingredients.forEach(data => {
        const ingred = document.createElement('div');
        ingred.classList.add('ingred');
        ingred.draggable = true;
        ingred.innerHTML = `
            <input class='ingred__id' type='hidden' value='${data.ingredient_id}'>
            <img class='ingred__image' src='public/images/ingredient/${data.ingredient_image}'>
            <div class='ingred__name'>${data.ingredient_name}</div>
        `;
        ingreds.append(ingred);
        new Ingred(ingred).data = data;
    })
}

function changeCategory(e) { //카테고리 변경
    categorys.forEach(el => el.classList.remove('active'));
    e.target.classList.add('active');
    getIngredients(e.target.textContent);
}

function updateMessage() {
    messageList.querySelectorAll('div').forEach(el => el.remove());
    myFridge.forEach(item => {
        const msg = document.createElement('div');
        msg.classList.add('message__item');
        msg.innerText = item.ingredient_name;
        messageList.append(msg);
    });
}

function saveFridge() {
    const formData = new FormData();
    const ids = [], xs = [], ys = [];

    myFridge.forEach(data => {
        ids.push(data.ingredient_id);
        xs.push(data.fridge_x);
        ys.push(data.fridge_y);
    });

    formData.append('ingredient_ids', ids);
    formData.append('fridge_xs', xs);
    formData.append('fridge_ys', ys);
    fetch('controller/fridge/saveFridge', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('등록 완료!');
            location.reload();
        }
    })
}

function getMyFridge() {
    fetch('controller/fridge/getMyFridge')
    .then(fridges => fridges.json())
    .then(fridges => {
        fridges.forEach(fridge => {
            const filtering = myFridge.filter(data => data.ingredient_id === fridge.ingredient_id)[0];
            if(!filtering) {
                myFridge.push(fridge);
            }
        })
        updateMessage();
        setPositionIngred();
    })
}

function setPositionIngred() {
    const ingredList = document.querySelectorAll('.ingred');
    ingredList.forEach(el => {
        const id = el.querySelector('.ingred__id').value;
        const filtering = myFridge.filter(data => data.ingredient_id === id)[0];
        if(filtering) {
            el.classList.add('moving');
            el.style.left = `${filtering.fridge_x}px`;
            el.style.top = `${filtering.fridge_y}px`;
        }
    })
}

function resetFridge() {
    if(confirm('초기화 하시겠습니까?')) {
        fetch('controller/fridge/resetFridge')
        .then(msg => msg.json())
        .then(msg => {
            if(msg.status === 'A200') {
                alert('초기화 완료!');
                location.reload();
            } else {
                alert('초기화 실패! 관리자에게 문의해주세요.');
            }
        })
    }
}
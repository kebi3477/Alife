const ingreds = document.querySelectorAll('.ingred');
const fridge = document.querySelector('.fridge');
const myFridge = [];

class Ingred {
    constructor(el) {
        this.ingred = el;
        this.ingred.ondragstart = e => this.dragStart(e);
        this.name = el.querySelector('.ingred__name').textContent;
        this.emptyCanvas = document.createElement('canvas');
        this.messageList = document.querySelector('.message__list');
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
        if(e.clientX > fridge.offsetLeft 
        && e.clientX < fridge.offsetLeft + fridge.offsetWidth
        && e.clientY > fridge.offsetTop
        && e.clientY < fridge.offsetTop + fridge.offsetHeight) {
            myFridge.push(this.name);
        } else {
            this.ingred.classList.remove('moving');
        }
        this.updateMessage();
    }
    updateMessage() {
        this.messageList.querySelectorAll('div').forEach(el => el.remove());
        myFridge.forEach(item => {
            const msg = document.createElement('div');
            msg.classList.add('message__item');
            msg.innerText = item;
            this.messageList.append(msg);
        });
    }
}

ingreds.forEach(el => {
    new Ingred(el);
})
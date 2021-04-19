const main = document.querySelector("#main");
const sound = document.querySelector('.sound');
let moster, monsterDoc, monsterEye, monsterMouseClose, monsterMouseOpen;


window.onload = () => {
    monster = document.querySelector(".monster");
    monsterDoc = monster.contentDocument;
    monsterEye = monsterDoc.querySelectorAll(".monster__eye");
    monsterMouseClose = monsterDoc.querySelector('.monster__mouse--close');
    monsterMouseOpen = monsterDoc.querySelector('.monster__mouse--open');
    window.onmousemove = e => {
        movingEye(e);
    }

    const mealClasses = [
        new Meal(), new Meal(), new Meal(), new Meal(),
        new Meal(), new Meal(), new Meal(), new Meal()
    ];
    mealClasses.forEach(obj => {
        obj.start();
    })
}

function movingEye(e) {
    const boxPositionX = monster.offsetLeft + monster.offsetWidth/2;
    const boxPositionY = monster.offsetTop + monster.offsetHeight/2;
    const range = 30;
    const left = (e.clientX-boxPositionX)/(range+10)+1066.769;
    const top = (e.clientY-boxPositionY)/range+705.373+(window.scrollY/15);
    const left2 = (e.clientX-boxPositionX)/(range+10)+905.376;
    
    if(e.clientX !== 0 && e.clientY !== 0) {
        monsterEye[0].style.transform = `translate(${left}px, ${top}px)`;
        monsterEye[1].style.transform = `translate(${left2}px, ${top}px)`;
    }
}

class Meal {
    constructor() {
        this.imgArr = ['chicken','cabbage','carrot','green_onion'];
        this.imgRandom = Math.floor(Math.random() * 4);
        this.object = `<object data="public/images/object/${this.imgArr[this.imgRandom]}.svg" type="image/svg+xml"></object>`;
        this.x = Math.floor(Math.random() * 1800);
        this.y = Math.floor(Math.random() * 800);
        this.reverseX = Math.floor(Math.random() * 2) ? true : false;
        this.reverseY = false;
        this.speed = Math.random() * 1 + .5;
        this.rotateFlag = Math.floor(Math.random() * 2) ? true : false;
        this.rotate = Math.random() * 2;
        this.scale = Math.random() * .2 + .8;
        this.init();
    }
    init() {
        this.emptyCanvas = document.createElement('canvas');
        this.mealSVG = document.createElement('div');
        this.mealSVG.classList.add('meal');
        this.mealSVG.innerHTML = this.object;
        this.mealSVG.draggable = 'true';
        this.mealSVG.ondragstart = e => this.pause(e);
        this.mealSVG.ondrag = e => this.drag(e);
        this.mealSVG.ondragend = e => this.restart(e);
        
        main.append(this.mealSVG);
    }
    moveObject() {
        this.mealSVG.style.transform = `scale(${this.scale}) rotate(${this.rotate}deg)`;
        this.mealSVG.style.left = `${this.x}px`;
        this.mealSVG.style.top = `${this.y}px`;
        if(this.mealSVG.offsetLeft + this.mealSVG.offsetWidth > document.body.offsetWidth) {
            this.reverseX = true;
        } else if(this.mealSVG.offsetLeft <= 0) {
            this.reverseX = false;
        }
        if(this.mealSVG.offsetTop + this.mealSVG.offsetHeight > window.innerHeight) {
            this.reverseY = true;
        } else if(this.mealSVG.offsetTop <= 0) {
            this.reverseY = false;
        }
        this.x = this.reverseX ? this.x - this.speed : this.x + this.speed;
        this.y = this.reverseY ? this.y - this.speed : this.y + this.speed;
        this.rotate += this.rotateFlag ? Math.random() * 1 : Math.random() * -1;
    }
    start() {
        this.moving = setInterval(() => this.moveObject(), 1);
    }
    pause(e) {
        e.dataTransfer.setDragImage(this.emptyCanvas, 0, 0);
        clearInterval(this.moving);
    }
    drag(e) {
        this.mealSVG.style.left = `${e.clientX-40}px`;
        this.mealSVG.style.top = `${e.clientY-40+window.scrollY}px`;
        if(monster.offsetWidth + monster.offsetLeft > e.clientX 
        && monster.offsetLeft < e.clientX
        && monster.offsetTop - window.scrollY < e.clientY
        && monster.offsetTop - window.scrollY + monster.offsetHeight > e.clientY) {
            this.mouseOpen();
        } else {
            this.mouseClose();
        }
        movingEye(e);
    }
    restart(e) {
        this.x = e.clientX;
        this.y = e.clientY+window.scrollY;
        if(monster.offsetWidth + monster.offsetLeft > e.clientX 
        && monster.offsetLeft < e.clientX
        && monster.offsetTop - window.scrollY < e.clientY
        && monster.offsetTop - window.scrollY + monster.offsetHeight > e.clientY) {
            this.eating();
        } else {
            this.mouseClose();
            this.start();
        }
    }
    mouseOpen() {
        monsterMouseOpen.style.display = 'block';
        monsterMouseClose.style.display = 'none';
    }
    mouseClose() {
        monsterMouseOpen.style.display = 'none';
        monsterMouseClose.style.display = 'block';
    }
    eating() {  
        this.mealSVG.remove();
        // sound.paused ? sound.play() : '';
        setTimeout(() => {
            this.x = Math.floor(Math.random() * 1800);
            this.y = Math.floor(Math.random() * 800);
            this.init();
            this.start();
        }, 3000);
    }
}